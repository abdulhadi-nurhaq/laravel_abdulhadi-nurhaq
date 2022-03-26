<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // method untuk menampilkan view form login
    public function login()
    {
        // memanggil view tambah
        return view('admin/login');
    }

    // method untuk menampilkan view form register
    public function register(Request $request)
    {
        // memanggil view tambah
        return view('admin/register');
    }

    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $data = ModelUser::where('username', $username)->first();
        if($data){ //apakah username tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                //Session::put('nama',$data->nama);
                Session::put('username',$data->username);
                Session::put('login',TRUE);
                return redirect('/hospital');
            }
            else{
                return redirect('/login')->with('alert','Username atau Password Salah !');
            }
        }
        else{
            return redirect('/login')->with('alert','Username atau Password Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/login')->with('alert','Anda Telah Logout');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'username' => 'required|min:4|unique:admin',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new ModelUser();
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('/login')->with('alert-success','Register Berhasil');
    }
}
