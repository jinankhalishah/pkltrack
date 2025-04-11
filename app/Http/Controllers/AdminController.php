<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    function login(){
        return view('admin.login');
    }

    function proseslogin(Request $request){
        $request -> validate([
            'username' => 'required|username',
            'password' => ['required', new LoginCheck($request)]

        ]);
        return redirect()->route('dashboardadmin');
    }

    function tampiladmin(){
        return view('admin.dashboard');
    }

    function fregister(){
        $admins = AdminModel::all();
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
            'email'  =>$request->email,
            'no_hp' =>$request->no_hp,
            'username' =>$request->username,
            'password'=> Hash::make($request->password),
        ];

        AdminModel::insert($dataInsert);

        return redirect()->route('formregister')->with('success','Pendaftaran Berhasil!');
    }

    function editAdmin($id) {
        $admins = AdminModel::where('id', $id)->first();
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
        AdminModel::where('id',$id)->update($dataUpdate);
        return redirect()->route('formregister')->with('succes','Data Berhasil Diubah');
    }

     function deleteAdmin($id){
        $admin = AdminModel::findOrFail($id);
        $admin->delete();
        return redirect()->route('formregister')->with('success','Data Berhasil Dihapus');

    }

    function logout(){
        Session::flush();
        return redirect()->route('loginadmin');
    }

}

