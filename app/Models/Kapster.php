<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kapster extends Model
{
    protected $table = 'kapster';
    public $timestamps = false;

    // 'foto' wajib didaftarkan di sini agar diizinkan masuk ke database
    protected $fillable = ['nama', 'keahlian', 'status', 'foto'];

    // Relasi: Satu Kapster punya banyak Reservasi (1:N)
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}