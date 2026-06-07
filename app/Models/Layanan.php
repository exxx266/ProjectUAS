<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    public $timestamps = false;

    protected $fillable = ['nama_layanan', 'harga', 'foto'];

    // Relasi Many-to-Many ke Reservasi melewati tabel pivot detail_reservasi
    public function reservasi()
    {
        return $this->belongsToMany(Reservasi::class, 'detail_reservasi', 'layanan_id', 'reservasi_id')
                    ->withPivot('harga_saat_ini');
    }
}