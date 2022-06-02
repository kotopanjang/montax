<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerWP;
use App\Http\Controllers\ControllerWP_Setting;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\FinancialCheckUpController;
use App\Http\Controllers\PdfController;

use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/t1', function () {return view('verifyemail');});
Route::get('/t2', function () {return view('forgotpassword');});
Route::get('/t3', function () {return view('resetpass');});
Route::get('/t4', function () {return view('otp');});


//ADMIN ROUTES SECTION START
Route::get('/show_iklan', [AdminController::class, 'Show_Iklan'])->name('show_iklan');
Route::post('/post_iklan', [AdminController::class, 'Post_Iklan'])->name('post_iklan');
Route::post('/edit_iklan', [AdminController::class, 'Edit_Iklan'])->name('edit_iklan');
//ADMIN ROUTES SECTION END

Route::get('/catatanku', function () {
    return view('catatan');
});

Route::get('/1', function () {
    return view('index');
});

Route::get('/2', function () {
    return view('WP.settings_security');
});

Route::get('/3', function () {
    return view('WP.settings_account');
});

Route::get('/a', function () {
    return view('WP_Parents.select_child');
});


Route::get('/daftardummy', [ControllerUser::class, 'daftardummy'])->name('daftardummy');
Route::get('/showgauge', [FinancialCheckUpController::class, 'showgauge'])->name('showgauge');

//SHOW FORM
Route::get('/', [ControllerUser::class, 'Show_Login'])->name('login');
Route::get('/register', [ControllerUser::class, 'Show_Register'])->name('register');

Route::post('/pendaftaran', [ControllerUser::class, 'pendaftaran'])->name('pendaftaran');
Route::post('/cekpembayaran', [ControllerUser::class, 'cekpembayaran'])->name('cekpembayaran');
Route::post('/updatebayar', [ControllerUser::class, 'updatebayar'])->name('updatebayar');

//FORM PROCESS
Route::post('/cekemail', [ControllerUser::class, 'Post_Cekemail'])->name('postcekemail');
Route::post('/postLogin', [ControllerUser::class, 'Post_Login'])->name('postLogin');
Route::post('/postRegister', [ControllerUser::class, 'Post_Register'])->name('postRegister');

Route::get('/masuk_user/{paramid}', [ControllerUser::class, 'masuk_ke_wp'])->name('masuk_user');


Route::get('/cek', [ControllerWP::class, 'cek'])->name('cek');
// Route::get('/create', [PdfController::class, 'create'])->name('create');

//LOGIN SUKSES
Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [ControllerUser::class, 'Show_Dashboard'])->name('dashboard');
    Route::post('post_tabungan', [ControllerWP::class, 'Post_Tabungan'])->name('post_tabungan');

    Route::get('pemasukan_WP', [ControllerWP::class, 'Show_Pemasukan'])->name('pemasukan_WP');
    Route::post('post_pemasukan', [ControllerWP::class, 'Post_Pemasukan'])->name('post_pemasukan');
    Route::get('pemasukan_datatable', [ControllerWP::class, 'Pemasukan_Showdatable'])->name('pemasukan_datatable');
    Route::post('show_edit_pemasukan', [ControllerWP::class, 'Show_Edit_Pemasukan'])->name('show_edit_pemasukan');
    Route::post('post_edit_pemasukan', [ControllerWP::class, 'Post_Edit_Pemasukan'])->name('post_edit_pemasukan');
    Route::post('post_delete_pemasukan', [ControllerWP::class, 'Post_Delete_Pemasukan'])->name('post_delete_pemasukan');

    Route::get('pemasukan_datatable_param/{var1}/{var2}', [ControllerWP::class, 'Pemasukan_Showdatable_Param'])->name('pemasukan_datatable_param/{var1}/{var2}');
    Route::post('/create_pemasukan_pdf', [PdfController::class, 'Pemasukan_PDF'])->name('create_pemasukan_pdf');


    Route::get('/pengeluaran_datatable_param/{var1}/{var2}', [ControllerWP::class,'Pengeluaran_Showdatable_Param'])->name('/pengeluaran_datatable_param/{var1}/{var2}');
    Route::post('/create_pengeluaran_pdf', [PdfController::class, 'Pengeluaran_PDF'])->name('create_pengeluaran_pdf');

    Route::get('/hutang_datatable_param/{var1}/{var2}', [ControllerWP::class,'Hutang_Showdatable_Param'])->name('/hutang_datatable_param/{var1}/{var2}');
    Route::post('/create_hutang_pdf', [PdfController::class, 'Hutang_PDF'])->name('create_hutang_pdf');

    Route::get('/aset_datatable_param/{var1}/{var2}', [ControllerWP::class,'Aset_Showdatable_Param'])->name('/aset_datatable_param/{var1}/{var2}');
    Route::post('/create_aset_pdf', [PdfController::class, 'Aset_PDF'])->name('create_aset_pdf');

    Route::get('/abc', [PdfController::class, 'abc'])->name('abc');

    Route::get('pengeluaran_WP', [ControllerWP::class, 'Show_Pengeluaran'])->name('pengeluaran_WP');
    Route::post('post_pengeluaran', [ControllerWP::class, 'Post_Pengeluaran'])->name('post_pengeluaran');
    Route::post('CB_Sub_Pengeluaran', [ControllerWP::class,'Combobox_Sub_Pengeluaran'])->name('CB_Sub_Pengeluaran');
    Route::get('pengeluaran_datatable', [ControllerWP::class, 'Pengeluaran_Showdatable'])->name('pengeluaran_datatable');
    Route::post('show_edit_pengeluaran', [ControllerWP::class, 'Show_Edit_Pengeluaran'])->name('show_edit_pengeluaran');
    Route::post('post_edit_pengeluaran', [ControllerWP::class, 'Post_Edit_Pengeluaran'])->name('post_edit_pengeluaran');
    Route::post('post_delete_pengeluaran', [ControllerWP::class, 'Post_Delete_Pengeluaran'])->name('post_delete_pengeluaran');
    //route anakan
    Route::post('Custom_Sub_Pengeluaran', [ControllerWP::class,'CustomCategory_Sub_Pengeluaran'])->name('Custom_Sub_Pengeluaran');


    Route::get('hutang_WP', [ControllerWP::class, 'Show_Hutang'])->name('hutang_WP');
    Route::post('post_hutang', [ControllerWP::class, 'Post_Hutang'])->name('post_hutang');
    Route::get('hutang_datatable', [ControllerWP::class, 'Hutang_Showdatable'])->name('hutang_datatable');
    Route::post('show_edit_hutang', [ControllerWP::class, 'Show_Edit_Hutang'])->name('show_edit_hutang');
    Route::post('post_edit_hutang', [ControllerWP::class, 'Post_Edit_Hutang'])->name('post_edit_hutang');
    Route::post('post_delete_hutang', [ControllerWP::class, 'Post_Delete_Hutang'])->name('post_delete_hutang');

    Route::get('budgeting_WP', [ControllerWP::class, 'Show_Budgeting'])->name('budgeting_WP');
    Route::post('post_budgeting', [ControllerWP::class, 'Post_Budgeting'])->name('post_budgeting');
    Route::get('budgeting_datatable', [ControllerWP::class, 'Budgeting_Showdatable'])->name('budgeting_datatable');

    Route::post('show_edit_budgeting', [ControllerWP::class, 'Show_Edit_Budgeting'])->name('show_edit_budgeting');
    Route::post('post_edit_budgeting', [ControllerWP::class, 'Post_Edit_Budgeting'])->name('post_edit_budgeting');
    Route::post('post_delete_budgeting', [ControllerWP::class, 'Post_Delete_Budgeting'])->name('post_delete_budgeting');

    Route::get('dana_impian_WP', [ControllerWP::class, 'Show_Dana_Impian'])->name('dana_impian_WP');

    Route::post('post_dana_impian', [ControllerWP::class, 'Post_Dana_Impian'])->name('post_dana_impian');
    Route::get('dana_impian_datatable', [ControllerWP::class, 'Dana_Impian_Showdatable'])->name('dana_impian_datatable');
    Route::post('show_edit_dana_impian', [ControllerWP::class, 'Show_Edit_Dana_Impian'])->name('show_edit_dana_impian');
    Route::post('post_edit_dana_impian', [ControllerWP::class, 'Post_Edit_Dana_Impian'])->name('post_edit_dana_impian');
    Route::post('post_delete_dana_impian', [ControllerWP::class, 'Post_Delete_Dana_Impian'])->name('post_delete_dana_impian');




    Route::get('aset_WP', [ControllerWP::class, 'Show_Aset'])->name('aset_WP');
    Route::post('CB_Sub_Harta', [ControllerWP::class,'Combobox_Sub_Aset'])->name('CB_Sub_Harta');
    Route::get('aset_datatable', [ControllerWP::class, 'Aset_Showdatable'])->name('aset_datatable');
    Route::post('post_harta', [ControllerWP::class, 'Post_Aset'])->name('post_harta');
    Route::post('show_edit_aset', [ControllerWP::class, 'Show_Edit_Aset'])->name('show_edit_aset');
    Route::post('post_edit_aset', [ControllerWP::class, 'Post_Edit_Aset'])->name('post_edit_aset');
    Route::post('post_delete_aset', [ControllerWP::class, 'Post_Delete_Aset'])->name('post_delete_aset');

    Route::get('saham_WP', [ControllerWP::class, 'Show_Saham'])->name('saham_WP');
    Route::post('post_buy_saham', [ControllerWP::class, 'Post_Buy_Saham'])->name('post_buy_saham');
    Route::get('saham_datatable', [ControllerWP::class, 'Saham_Showdatable'])->name('saham_datatable');
    Route::get('avg_saham_datatable', [ControllerWP::class, 'Stock_Saham_Showdatatable'])->name('avg_saham_datatable');
    Route::post('custom_sell_stock', [ControllerWP::class,'Custom_Combobox_Stock_Sell'])->name('custom_sell_stock');

    Route::post('post_deposit', [ControllerWP::class, 'Post_Deposit'])->name('post_deposit');
    Route::post('post_withdraw', [ControllerWP::class, 'Post_Withdraw'])->name('post_withdraw');

    Route::get('financial_check_up', [FinancialCheckUpController::class, 'Show_Financial_Check_Up'])->name('financial_check_up');
    Route::post('FU_chart_FinancialOverview', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_FinancialOverview'])->name('FU_chart_FinancialOverview');
    Route::post('FU_chart_IncomeOverview', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_IncomeOverview'])->name('FU_chart_IncomeOverview');
    Route::post('FU_chart_RasioPenghasilanDanPengeluaran', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_RasioPenghasilanDanPengeluaran'])->name('FU_chart_RasioPenghasilanDanPengeluaran');
    Route::post('FU_chart_RasioPassiveIncome', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_RasioPassiveIncome'])->name('FU_chart_RasioPassiveIncome');
    Route::post('FU_chart_DistribusiPemasukan', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_DistribusiPemasukan'])->name('FU_chart_DistribusiPemasukan');
    Route::post('FU_chart_DistribusiPengeluaran', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_DistribusiPengeluaran'])->name('FU_chart_DistribusiPengeluaran');
    Route::post('FU_chart_RasioTabungan', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_RasioTabungan'])->name('FU_chart_RasioTabungan');
    Route::post('FU_chart_DanaImpian', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_DanaImpian'])->name('FU_chart_DanaImpian');
    Route::post('FU_chart_SaranRasio', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_SaranRasio'])->name('FU_chart_SaranRasio');
    Route::post('FU_chart_Perbandingan_Hutang_Asset', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_Perbandingan_Hutang_Asset'])->name('FU_chart_Perbandingan_Hutang_Asset');
    Route::post('FU_chart_Rasio_Pelunasan_Hutang', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_Rasio_Pelunasan_Hutang'])->name('FU_chart_Rasio_Pelunasan_Hutang');
    Route::post('FU_chart_Rasio_Perbandingan_Aset_Investasi_vs_Nilai_Bersih_Kekayaan', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_Rasio_Perbandingan_Aset_Investasi_vs_Nilai_Bersih_Kekayaan'])->name('FU_chart_Rasio_Perbandingan_Aset_Investasi_vs_Nilai_Bersih_Kekayaan');
    Route::post('FU_chart_Rasio_Perbandingan_Nilai_Bersih_Aset_vs_Nilai_Bersih_Kekayaan', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_Rasio_Perbandingan_Nilai_Bersih_Aset_vs_Nilai_Bersih_Kekayaan'])->name('FU_chart_Rasio_Perbandingan_Nilai_Bersih_Aset_vs_Nilai_Bersih_Kekayaan');
    Route::post('FU_chart_Budgeting', [FinancialCheckUpController::class, 'Show_Financial_Check_Up_Chart_Budgeting'])->name('FU_chart_Budgeting');
    
    

    Route::get('SPT_WP', [ControllerWP::class, 'Show_SPT'])->name('SPT_WP');


    Route::get('SPT_BuktiPotong_WP', [ControllerWP::class, 'Show_BuktiPotong_SPT'])->name('SPT_BuktiPotong_WP');
    Route::post('post_bukti_potong', [ControllerWP::class, 'Post_Bukti_Potong'])->name('post_bukti_potong');
    Route::get('bupot_datatable', [ControllerWP::class, 'Bukti_Potong_Showdatable'])->name('bupot_datatable');
    Route::post('show_edit_bupot', [ControllerWP::class, 'Show_Edit_Bukti_Potong'])->name('show_edit_bupot');
    Route::post('post_edit_bupot', [ControllerWP::class, 'Post_Edit_Bukti_Potong'])->name('post_edit_bupot');
    Route::post('post_delete_bupot', [ControllerWP::class, 'Post_Delete_Bukti_Potong'])->name('post_delete_bupot');

    Route::get('SPT_Panduan_WP/{tahun}', [ControllerWP::class, 'Show_Panduan_SPT'])->name('SPT_Panduan_WP');
    Route::get('SPT_Panduan_WP_PDF/{tahun}', [ControllerWP::class, 'Show_Panduan_SPT_PDF'])->name('SPT_Panduan_WP_PDF');
    Route::get('SPT_Panduan_WP', [ControllerWP::class, 'Show_Panduan_SPT'])->name('SPT_Panduan_WP');
    Route::get('SPT_Dashboard_Panduan_WP', [ControllerWP::class, 'Show_Dashboard_Panduan'])->name('SPT_Dashboard_Panduan_WP');


    //SETTINGS
    Route::get('setting', [ControllerWP_Setting::class, 'Show_Settings'])->name('setting');
    Route::post('post_wp', [ControllerWP_Setting::class, 'Post_Data_WP'])->name('post_wp');

    Route::get('setting_kk', [ControllerWP_Setting::class, 'Show_Settings_KK'])->name('setting_kk');
    Route::post('post_kk', [ControllerWP_Setting::class, 'Post_Data_KK'])->name('post_kk');
    Route::get('get_kk', [ControllerWP_Setting::class, 'Get_KK'])->name('get_kk');
    Route::post('delete_kk', [ControllerWP_Setting::class, 'Delete_KK'])->name('delete_kk');


    Route::get('User_logout', [ControllerUser::class, 'User_logout'])->name('User_logout');

    Route::get('pph', [ControllerWP::class, 'rumus_pph'])->name('pph');
});
