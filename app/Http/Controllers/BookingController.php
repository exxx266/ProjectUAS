<?php

namespace App\Http\Controllers;

use App\Models\Kapster;
use App\Models\Layanan;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException; // Penting untuk menangkap error dari Model

class BookingController extends Controller
{
    // 1. Menampilkan Halaman Form Booking
    public function create()
    {
        $kapsters = Kapster::where('status', 'Aktif')->get();
        $layanans = Layanan::all();

        return view('booking.create', compact('kapsters', 'layanans'));
    }

    // 2. Memproses Data Booking yang Dikirim Pelanggan
    public function store(Request $request)
    {
        $request->validate([
            'kapster_id'        => 'required|exists:kapster,id',
            'tanggal'           => 'required|date|after_or_equal:today',
            'slot_waktu'        => 'required|string',
            'metode_pembayaran' => 'required|string',
            'layanan'           => 'required|array|min:1',
            'layanan.*'         => 'exists:layanan,id',
        ]);

        DB::beginTransaction();

        try {
            // A. Simpan ke tabel Induk menggunakan ELOQUENT
            // WAJIB pakai Reservasi::create agar fungsi booted() di Model kamu TERPICU!
            $reservasi = Reservasi::create([
                'user_id'           => Auth::id(),
                'kapster_id'        => $request->kapster_id,
                'tanggal'           => $request->tanggal,
                'slot_waktu'        => $request->slot_waktu,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status_pembayaran' => 'Pending',
            ]);

            // B. Siapkan data untuk tabel Pivot (detail_reservasi)
            $detailData = [];
            foreach ($request->layanan as $layananId) {
                $hargaLayanan = Layanan::where('id', $layananId)->value('harga');
                
                $detailData[] = [
                    'reservasi_id'   => $reservasi->id, // Ambil ID dari objek yang baru terbuat
                    'layanan_id'     => $layananId,
                    'harga_saat_ini' => $hargaLayanan,
                ];
            }

            // Simpan massal ke detail_reservasi
            DB::table('detail_reservasi')->insert($detailData);

            DB::commit();

            return redirect('/#home')->with('success', 'Reservasi berhasil dibuat! Silakan datang sesuai jadwal.');

        } catch (ValidationException $e) {
            // Tangkap spesifik error validasi jam dari fungsi booted() di Model
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
            
        } catch (\Exception $e) {
            // Tangkap error database/server lainnya
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal membuat reservasi: ' . $e->getMessage()])->withInput();
        }
    }

    // 3. Menampilkan Riwayat Booking Pelanggan (Dashboard User)
    public function index()
    {
        // Ambil data menggunakan relasi 'kapster' dan 'layanan' (sesuai penamaan di Model kamu)
        $riwayatReservasi = Reservasi::with(['kapster', 'layanan'])
            ->where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('booking.history', compact('riwayatReservasi'));
    }
}