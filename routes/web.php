<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminS3PMController;
use App\Http\Controllers\DataCovidController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PersebaranCOVIDController;

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

Route::middleware('web')->group(function() {
    
    Route::get('/',[HomeController::class , 'index'])->middleware('guest');
    Route::get('tentang',[HomeController::class , 'tentang']);
    Route::get('logout',[LogoutController::class,'logout']);
    
    Route::controller(AuthController::class)->group(function(){
        Route::get('login','index')->name('login');
        Route::post('login','ceklogin');
        
    });

    Route::controller(AdminController::class)->group(function(){
        Route::get('admin','index')->name('admin');
        Route::post('admin','inputAdmin');
        Route::get('admin/d/{id}', 'delete');
        Route::get('admin/u/{id}','edit');
        Route::post('/admin/u/','update');
    });

    Route::controller(AdminS3PMController::class)->group(function(){
        Route::get('dashboard','index')->name('dashboard');
    });

    Route::controller(DataCovidController::class)->group(function(){
        Route::get('KelolaDataCOVID','index');
        Route::post('KelolaDataCOVID','input');
        Route::get('KelolaDataCOVID/d/{id}','delete');
        Route::get('KelolaDataCOVID/u/{id}','update');
        Route::post('KelolaDataCOVID/u/{id}','edit');
    });

    Route::controller(KecamatanController::class)->group(function(){
        Route::get('KelolaKecamatan','index');
        Route::post('KelolaKecamatan','input');
        Route::get('KelolaKecamatan/u/{id}','edit');
        Route::post('KelolaKecamatan/u/{id}','update');
        Route::get('/kelolaKecamatan/d/{id}','delete');
    });

    Route::controller(ExportController::class)->group(function(){
        Route::get('PDF','exportPDF');
        Route::get('EXCEL','exportExcel')->middleware('auth');
        Route::get('PDFK','KExportPDF')->middleware('auth');
    });

    Route::get('Data_Persebaran', [PersebaranCOVIDController::class, 'index']);
    Route::post('import', [ImportController::class, 'import']);
});

