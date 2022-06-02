<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
        '/pemasukan_datatable','/postRegister','/show_edit_pemasukan','/post_edit_pemasukan','/post_delete_pemasukan','/Custom_Sub_Pengeluaran','/CB_Sub_Pengeluaran','/pengeluaran_datatable','/show_edit_pengeluaran','/post_edit_pengeluaran','/post_delete_pengeluaran','/CB_Sub_Harta','/aset_datatable','/show_edit_aset','/post_edit_aset','/post_delete_aset','/bupot_datatable','/show_edit_bupot','/post_edit_bupot','/post_delete_bupot','/hutang_datatable','/show_edit_hutang','/post_edit_hutang','/post_delete_hutang','/budgeting_datatable','/show_edit_budgeting','/post_edit_budgeting','/post_delete_budgeting','/dana_impian_datatable','/show_edit_dana_impian','/post_edit_dana_impian','/post_delete_dana_impian','/saham_datatable','/avg_saham_datatable','/post_delete_saham','/custom_sell_stock','/pemasukan_datatable_param/{var1}/{var2}',
        '/FU_chart_IncomeOverview',
        '/FU_chart_RasioPenghasilanDanPengeluaran',
        '/FU_chart_RasioPassiveIncome',
        '/FU_chart_DistribusiPemasukan',
        '/FU_chart_DistribusiPengeluaran',
        '/FU_chart_RasioTabungan',
        '/FU_chart_FinancialOverview',
        '/FU_chart_DanaImpian',
        '/FU_chart_SaranRasio',
        '/FU_chart_Perbandingan_Hutang_Asset',
        '/FU_chart_Rasio_Pelunasan_Hutang',
        '/FU_chart_Rasio_Perbandingan_Aset_Investasi_vs_Nilai_Bersih_Kekayaan',
        '/FU_chart_Rasio_Perbandingan_Nilai_Bersih_Aset_vs_Nilai_Bersih_Kekayaan',
        '/FU_chart_Budgeting',
        '/post_wp',
        '/post_kk',
        '/get_kk',
        '/delete_kk',
        '/pengeluaran_datatable_param/{var1}/{var2}',
        '/hutang_datatable_param/{var1}/{var2}',
        '/aset_datatable_param/{var1}/{var2}',
    ];
}
