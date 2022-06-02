<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budgeting extends Model
{
    use HasFactory;

    public $table = "budgeting";

    protected $fillable=[
        'ID_Record',
        'ID_WP',
        'Nomor_Perkiraan',
        'Sub_Nomor_Perkiraan',
        'Start_Berlaku',
        'Exp_Berlaku',
        'Jumlah_Budget',
        'created_at',
        'updated_at',
        'show_status',
    ];

    public static function select_pemasukan($paramid)
    {
        $id_wp = $paramid;
        $param['budgeting']         = \DB::table('budgeting')->where('ID_WP', '=', $id_wp)
                                                            ->where('show_status','=',1)
                                                            ->get();
        return $param['budgeting'];
    }
}
