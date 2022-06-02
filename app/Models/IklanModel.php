<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IklanModel extends Model
{
    use HasFactory;

    public $table ="iklan";
    protected $fillable = [
        'ID_Records',
        'Nama_Foto',
        'Created_at	',
        'Updated_at	',
        'Show_status',
    ];

    public $incrementing = false;
    public $timestamps = false;
}
