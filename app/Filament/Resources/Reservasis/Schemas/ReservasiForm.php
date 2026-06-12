<?php

namespace App\Filament\Resources\Reservasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Support\Str;

class ReservasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // 1. Pilihan Pelanggan + Fitur Quick Add (Sistem Email Palsu Otomatis)
                Select::make('user_id')
                    ->relationship('user', 'name') // SINKRONISASI 1: Ubah 'nama' menjadi 'name'
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Pelanggan')
                    ->createOptionForm([
                        // Kasir HANYA perlu mengisi nama, sisanya sistem yang urus
                        TextInput::make('name') // SINKRONISASI 2: Ubah dari 'nama' menjadi 'name'
                            ->required()
                            ->label('Nama Pelanggan Walk-in'),
                    ])
                    ->createOptionUsing(function (array $data) {
                        // Meracik email palsu unik (hilangkan spasi + tambah 5 karakter acak)
                        $emailPalsu = strtolower(str_replace(' ', '', $data['name'])) . '_' . Str::random(5) . '@walkin.local';

                        // SINKRONISASI 3: Ubah 'nama' => $data['nama'] menjadi 'name' => $data['name']
                        return User::create([
                            'name' => $data['name'],
                            'email' => $emailPalsu,
                            'password' => bcrypt('pelanggan123'), 
                        ]);
                    }),

                // 2. Pilihan Kapster (Tetap 'nama' karena tabel kapster menggunakan 'nama')
                Select::make('kapster_id')
                    ->relationship('kapster', 'nama') 
                    ->required()
                    ->searchable()
                    ->preload()
                    ->label('Kapster'),

                // 3. Pilihan Multi-Layanan
                Select::make('layanan')
                    ->relationship('layanan', 'nama_layanan')
                    ->multiple()
                    ->preload()
                    ->required()
                    ->live()
                    ->label('Layanan / Jasa'),

                // Layar kalkulator otomatis
                Placeholder::make('total_tagihan')
                    ->label('Total Tagihan')
                    ->content(function ($get) {
                        $layananIds = $get('layanan');

                        if (empty($layananIds)) {
                            return 'Rp 0';
                        }

                        $total = Layanan::whereIn('id', $layananIds)->sum('harga');

                        return 'Rp ' . number_format($total, 0, ',', '.');
                    }),

                // 4. Jadwal Pangkas Rambut
                DatePicker::make('tanggal')
                    ->required()
                    ->default(now())
                    ->minDate(today())
                    ->label('Tanggal Booking'),

                // Input Jam dengan Logika Anti-Bentrok
                TimePicker::make('slot_waktu')
                    ->label('Jam Reservasi')
                    ->minDate('10:00')
                    ->maxDate('22:00')
                    ->required()
                    ->seconds(false)
                    ->label('Jam')
                    ->rule(
                        fn ($get, $record) => function (string $attribute, $value, \Closure $fail) use ($get, $record) {
                            
                            $bentrok = \App\Models\Reservasi::where('tanggal', $get('tanggal'))
                                ->where('kapster_id', $get('kapster_id'))
                                ->where('slot_waktu', $value)
                                ->when($record, fn ($query) => $query->where('id', '!=', $record->id))
                                ->exists();

                            if ($bentrok) {
                                $fail('⚠️ Jadwal bentrok! Kapster ini sudah di-booking pada tanggal dan jam tersebut.');
                            }
                        }
                    ),

                // 5. Administrasi Pembayaran
                Select::make('metode_pembayaran')
                    ->options([
                        'QRIS' => 'QRIS',
                        'Cash' => 'Cash',
                        'Transfer' => 'Transfer',
                    ])
                    ->label('Metode Pembayaran'),

                Select::make('status_pembayaran')
                    ->options([
                        'Pending' => 'Pending',
                        'Lunas' => 'Lunas',
                        'Batal' => 'Batal',
                    ])
                    ->required()
                    ->default('Pending')
                    ->label('Status Pembayaran'),
                
            ]);
    }
}