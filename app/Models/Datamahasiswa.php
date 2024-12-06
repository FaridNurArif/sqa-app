<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datamahasiswa extends Model
{
    use HasFactory;

    protected $table = 'datamahasiswas';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'jurusan',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'alamat_tinggal',
        'foto',
    ];

    /**
     * Format default untuk atribut tanggal.
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
