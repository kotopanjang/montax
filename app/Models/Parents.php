<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    public $table = "parents";

    protected $fillable=[
        'id',
        'name',
        'email',
        'password',
        'membership',
        'start_membership',
        'exp_membership',
        'created_at',
        'updated_at',
        'show_status',
    ];

    // public $incrementing = false;
    // public $timestamps = false;
}
