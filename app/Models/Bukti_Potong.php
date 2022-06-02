<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti_Potong extends Model
{
    use HasFactory;
    
    public $table = "bukti_potong";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Jenis_Pajak	NPWP_Pemotong',
        'Nama_Pemotong',
        'Nomor_Bukti_Pemotongan',
        'Tanggal_Bukti_Pemotongan',
        'Jumlah',
        'created_at',
        'updated_at',
        'show_status',
    ];
}
