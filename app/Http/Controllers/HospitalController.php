<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    public function index()
    {
    	// mengambil data dari table hospital
    	$hospital = DB::table('hospital')->get();
        
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // mengirim data hospital ke view index
            return view('hospital/index',['hospital' => $hospital]);
        }
    }

    // method untuk menampilkan view form tambah hospital
    public function tambah()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // memanggil view tambah
            return view('hospital/tambah');
        }
    }

    // method untuk insert data ke table hospital
    public function store(Request $request)
    {
        // insert data ke table hospital
        DB::table('hospital')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);
        // alihkan halaman ke halaman hospital
        return redirect('/hospital')->with('alert-success','Data Berhasil Ditambah');
    }

    // method untuk edit data hospital
    public function edit($id)
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // mengambil data hospital berdasarkan id yang dipilih
            $hospital = DB::table('hospital')->where('id',$id)->get();
            // passing data hospital yang didapat ke view edit.blade.php
            return view('hospital/edit',['hospital' => $hospital]);
        }
    }

    // update data hospital
    public function update(Request $request)
    {
        // update data hospital
        DB::table('hospital')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'telepon' => $request->telepon
        ]);
        // alihkan halaman ke halaman hospital
        return redirect('/hospital')->with('alert-success','Data Berhasil Diupdate');
    }

    // method untuk hapus data hospital
    public function hapus($id)
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // menghapus data hospital berdasarkan id yang dipilih
            DB::table('hospital')->where('id',$id)->delete();
                
            // alihkan halaman ke halaman hospital
            return redirect('/hospital')->with('alert-success','Data Berhasil Dihapus');
        }
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // mengambil data dari table hospital sesuai pencarian data
            $hospital = DB::table('hospital')
            ->where('nama','like',"%".$cari."%")
            ->get();
    
            // mengirim data hospital ke view index
            return view('hospital/index',['hospital' => $hospital]);
        }
	}
}
