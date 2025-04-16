<?php

namespace App\Http\Controllers;

use App\Models\pembimbingModel;
use Hash;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    function fregisterpembimbing()
    {
        $pembimbings = pembimbingModel::all();
        return view('admin.registerpembimbing', compact('pembimbings'));
    }

    function daftarpem(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|min:5|string|max:255',
            'nip' => 'required|min:5|string|max:255',
            'email' => 'required|email|unique:data_pembimbing,email',
            'no_hp' => 'required|min:5|string|max:255',
            'jabatan' => 'required|min:5|string|max:255',
            'status' => 'required|min:5|string|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $dataInsert = [
            'username' => $request->username,
            'nip' => $request->nip,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ];

        pembimbingModel::insert($dataInsert);

        return redirect()->route('formregisterpembimbing')->with('success', 'Pendaftaran Berhasil!');
    }

    function editPembimbing(string $id)
    {
        $pembimbings = pembimbingModel::where('id', $id)->first();
        $data = [
            'pembimbing' => $pembimbings
        ];
        return view('pembimbing.edit', $data);
    }

    function updatePembimbing(Request $request, string $id)
    {
        $username = $request->input('username');
        $nip = $request->input('nip');
        $email = $request->input('email');
        $no_hp = $request->input('no_hp');
        $jabatan = $request->input('jabatan');
        $status = $request->input('status');
        $password = $request->input('password');

        $dataUpdate = [
            'username' => $username,
            'nip' => $nip,
            'email' => $email,
            'no_hp' => $no_hp,
            'jabatan' => $jabatan,
            'status' => $status,
        ];

        if ($password) {
            $dataUpdate['password'] = Hash::make($password);
        }

        pembimbingModel::where('id', $id)->update($dataUpdate);
        return redirect()->route('formregisterpembimbing')->with('success', 'Data Berhasil Diubah');
    }

    function deletePembimbing($id)
    {
        $admin = pembimbingModel::findOrFail($id);
        $admin->delete();
        return redirect()->route('formregisterpembimbing')->with('success', 'Data Berhasil Dihapus');
    }
}
