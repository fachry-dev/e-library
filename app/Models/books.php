<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;


    /**
     * the attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'Nama Buku',
        'Penerbit',
        'Description',
        'Tahun Terbit',
        'Jumlah Halaman'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'tahun_terbit' => 'integer',
        'jumlah_halaman' => 'integer',
    ];
}
