<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HospitalController;

use App\Http\Controllers\PasienController;

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

Route::get('/', function () {
    // mengambil data dari table hospital
    $hospital = DB::table('hospital')->get();
        
    if(!Session::get('login')){
        return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
    }
    else{
        // mengirim data hospital ke view index
        return view('hospital/index',['hospital' => $hospital]);
    }
});

//Routes Untuk Hospital

Route::get('/hospital', [HospitalController::class, 'index']);

Route::get('/hospital/tambah', [HospitalController::class, 'tambah']);

Route::post('/hospital/store', [HospitalController::class, 'store']);

Route::get('/hospital/edit/{id}', [HospitalController::class, 'edit']);

Route::post('/hospital/update', [HospitalController::class, 'update']);

Route::get('/hospital/hapus/{id}', [HospitalController::class, 'hapus']);

Route::get('/hospital/cari', [HospitalController::class, 'cari']);

//Routes Untuk Pasien

Route::get('/pasien', [PasienController::class, 'index']);

Route::get('/pasien/tambah', [PasienController::class, 'tambah']);

Route::post('/pasien/store', [PasienController::class, 'store']);

Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);

Route::post('/pasien/update', [PasienController::class, 'update']);

Route::get('/pasien/hapus/{id}', [PasienController::class, 'hapus']);

Route::get('/pasien/cari', [PasienController::class, 'cari']);

Route::get('/login', [AdminController::class, 'login']);

Route::post('/loginPost', [AdminController::class, 'loginPost']);

Route::get('/register', [AdminController::class, 'register']);

Route::post('/registerPost', [AdminController::class, 'registerPost']);

Route::get('/logout', [AdminController::class, 'logout']);