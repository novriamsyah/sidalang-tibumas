<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'pelanggarans';
    protected $fillable = [
            'petugas',
            'nama',
            'nik',
            'fl_nik',
            'pekeerjaan',
            'nohp',
            'lks_pelanggaran',
            'jns_pelanggaran',
            'kelurahan',
            'kecamatan',
            'sanksi',
            'alamat',
            'desk_pelanggaran',
    ];
}
