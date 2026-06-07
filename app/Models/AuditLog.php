<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    // Beritahu Laravel nama tabel aslinya di database
    protected $table = 'audit_log';

    // Beritahu bahwa kita tidak menggunakan kolom timestamps bawaan Laravel
    public $timestamps = false;

    protected $fillable = [
        'nama_tabel', 
        'aksi', 
        'waktu_kejadian', 
        'deskripsi'
    ];
}