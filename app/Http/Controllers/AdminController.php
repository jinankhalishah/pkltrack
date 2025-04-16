<?php

namespace App\Http\Controllers;


use App\Models\adminModel1;
use App\Models\pembimbingModel;
use App\Rules\LoginCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;


class AdminController extends Controller
{
    function login(){
        return view('admin.login');
    }

    function proseslogin(Request $request){
        $request -> validate([
            'email' => 'required|email',
            'password' => ['required', new LoginCheck($request)]

        ]);
        return redirect()->route('dashboardadmin')->with('success','login berhasil😍');
    }

    function tampiladmin(){
        return view('admin.dashboard');
    }

    function fregister(){
        $admins = adminModel1::all();
        return view('admin.formregister', compact('admins'));
    }
    function daftar(Request $request)
    {
        // Validasi input
           $request->validate([
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|min:5|string|max:255',
            'username' => 'required|min:5|string|max:255',
            'password' => 'required|min:6|confirmed',

        ]);

        $dataInsert =[
            'email' =>$request->email,
            'no_hp' =>$request->no_hp,
            'username'  =>$request->username,
            'password'=> Hash::make($request->password),
        ];

        adminModel1::insert($dataInsert);

        return redirect()->route('formregister')->with('succes','Pendaftaran Berhasil!');
    }


    function editAdmin($id) {
        $admins = adminModel1::where('id', $id)->first();
        $data = [
            'admin' => $admins
        ];
        return view('admin.edit', $data);
    }

    function updateAdmin(Request $request, $id){
        $email = $request->input('email');
        $no_hp = $request->input('no_hp');
        $username = $request->input('username');
        $password = $request->input('password');

        $dataUpdate =[
            'email' =>$email,
            'no_hp' =>$no_hp,
            'username' => $username,
        ];

        if($password){
            $dataUpdate['password'] = Hash::make($password);
        }
        adminModel1::where('id',$id)->update($dataUpdate);
        return redirect()->route('formregister')->with('succes','Data Berhasil Diubah');
    }

     function deleteAdmin($id){
        $admin = adminModel1::findOrFail($id);
        $admin->delete();
        return redirect()->route('formregister')->with('success','Data Berhasil Dihapus');

    }

  








    function logout(){
        Session::flush();
        return redirect()->route('loginadmin');
    }

}

