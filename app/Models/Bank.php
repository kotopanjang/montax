<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'Kode_Bank',
        'Nama_Bank',
        'Jenis',
    ];

    public $incrementing = false;
    public $timestamps = false;

}
