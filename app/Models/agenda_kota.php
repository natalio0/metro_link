<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda_kota extends Model
{
    use HasFactory;

    protected $table = 'agenda_kotas';  // Pastikan tabel ini benar

    protected $fillable = [
        'nama_penyelenggara',
        'nama_event',
        'kategori',
        'deskripsi_event',
        'tanggal_pelaksanaan',
        'status',
    ];
}
