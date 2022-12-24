<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\karyawan;

class karyawanController extends Controller
{
    //READ
    public function karyawanView() {
        // $allDataUser=User::all();
        $data['allDataKyn']=karyawan::all();
        return view('backend.karyawan.view_user', $data);
    }
    //CREATE
    public function karyawanAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.karyawan.add_user');
    }

    //FUNCTION MELAKUKAN CREATE
    public function karyawanStore(Request $request) {

        $data=new karyawan();
        $data->nama=$request->nama;
        $data->email=$request->email;
        $data->alamat=$request->alamat;
        $data->gender=$request->gender;
        $data->umur=$request->umur;
        $data->save();

        return redirect()->route('karyawan.view')->with('info', 'Tambah User berhasil');
    }

    //update
    public function karyawanEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= karyawan::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function karyawanUpdate(Request $request, $id) {
        $validatedData=$request->validate([
            'email' => 'required|unique:users',
            'textNama' => 'required'
        ]);

        $data=karyawan::find($id);
        $data->usertype=$request->selectUser;
        $data->name=$request->textNama;
        $data->email=$request->email;
        // $data->password=bcrypt($request->password);
        $data->save();

        return redirect()->route('user.view')->with('info', 'Update User berhasil');
    }

    //DELETE
    public function karyawanDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= karyawan::find($id);
        $deleteData->delete();

        return redirect()->route('user.view')->with('info', 'Delete User berhasil');
    }
}
