<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $table = 'audit_log';

    public $timestamps = false;

    protected $fillable = [
        'nama_tabel', 
        'aksi', 
        'waktu_kejadian', 
        'deskripsi'
    ];
}