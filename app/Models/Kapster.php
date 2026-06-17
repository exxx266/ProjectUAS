<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kapster extends Model
{
    protected $table = 'kapster';
    public $timestamps = false;

    protected $fillable = ['nama', 'keahlian', 'status', 'foto'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}