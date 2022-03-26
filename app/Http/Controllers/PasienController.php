<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    public function index()
    {
    	// mengambil data dari table hospital
    	$pasien = DB::table('pasien')->get();
        
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // mengirim data hospital ke view index
            return view('pasien/index',['pasien' => $pasien]);
        }
    }

    // method untuk menampilkan view form tambah pasien
    public function tambah()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // memanggil view tambah
            return view('pasien/tambah');
        }
    }

    // method untuk insert data ke table pasien
    public function store(Request $request)
    {
        // insert data ke table pasien
        DB::table('pasien')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'hospital_id' => $request->hospital_id
        ]);
        // alihkan halaman ke halaman pasien
        return redirect('/pasien')->with('alert-success','Data Berhasil Ditambah');
    }

    // method untuk edit data pasien
    public function edit($id)
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // mengambil data pasien berdasarkan id yang dipilih
            $pasien = DB::table('pasien')->where('id',$id)->get();
            // passing data pasien yang didapat ke view edit.blade.php
            return view('pasien/edit',['pasien' => $pasien]);
        }
    }

    // update data pasien
    public function update(Request $request)
    {
        // update data pasien
        DB::table('pasien')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'hospital_id' => $request->hospital_id
        ]);
        // alihkan halaman ke halaman pasien
        return redirect('/pasien')->with('alert-success','Data Berhasil Diupdate');
    }

    // method untuk hapus data pasien
    public function hapus($id)
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda Harus Login Terlebih Dahulu !');
        }
        else{
            // menghapus data pasien berdasarkan id yang dipilih
            DB::table('pasien')->where('id',$id)->delete();
                
            // alihkan halaman ke halaman pasien
            return redirect('/pasien')->with('alert-success','Data Berhasil Dihapus');
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
            // mengambil data dari table pasien sesuai pencarian data
            $pasien = DB::table('pasien')
            ->where('nama','like',"%".$cari."%")
            ->get();
    
            // mengirim data pasien ke view index
            return view('pasien/index',['pasien' => $pasien]);
        }
	}
}
