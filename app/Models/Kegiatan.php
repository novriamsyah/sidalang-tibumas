<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'laporan_kegiatan';
    protected $fillable = [
        'petugas',
        'file_kegiatan',
        'nama_file',
    ];
}
