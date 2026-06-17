<?php

namespace App\Models;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'kapster_id', 'tanggal', 'slot_waktu', 
        'metode_pembayaran', 'status_pembayaran'
    ];

    // Relasi Balik (BelongsTo)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kapster()
    {
        return $this->belongsTo(Kapster::class);
    }

    // Relasi Many-to-Many ke Layanan
    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'detail_reservasi', 'reservasi_id', 'layanan_id')
                    ->withPivot('harga_saat_ini');
    }
    protected static function booted()
    {
        static::saving(function ($reservasi) {
            $jam = strtotime($reservasi->slot_waktu);
            $buka = strtotime('10:00:00');
            $tutup = strtotime('22:00:00');
            if ($jam < $buka || $jam > $tutup) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'slot_waktu' => 'Jam operasional hanya pukul 10:00 - 22:00. Silakan pilih jam lain.',
                ]);
            }
        });
    }
}