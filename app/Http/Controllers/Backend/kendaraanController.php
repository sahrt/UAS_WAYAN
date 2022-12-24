<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kendaraan;

class kendaraanController extends Controller
{
    public function kendaraanView() {
        // $allDataUser=User::all();
        $data['allDatakdr']=kendaraan::all();
        return view('backend.kendaraan.view_user', $data);
    }
    //CREATE
    public function kendaraanAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.kendaraan.add_user');
    }

    //FUNCTION MELAKUKAN CREATE
    public function kendaraanStore(Request $request) {

        $data=new kendaraan();
        $data->noplat=$request->noplat;
        $data->merekkendaraan=$request->merekkendaraan;
        $data->namapemilik=$request->namapemilik;
        $data->save();

        return redirect()->route('kendaraan.view')->with('info', 'Tambah Kendaraan berhasil');
    }

    //update
    public function kendaraanEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= kendaraan::find($id);
        return view('backend.kendaraan.edit_user', compact('editData'));
    }

    public function kendaraanUpdate(Request $request, $id) {
        $validatedData=$request->validate([
            'email' => 'required|unique:users',
            'textNama' => 'required'
        ]);

        $data=kendaraan::find($id);
        $data->usertype=$request->selectUser;
        $data->name=$request->textNama;
        $data->email=$request->email;
        // $data->password=bcrypt($request->password);
        $data->save();

        return redirect()->route('user.view')->with('info', 'Update User berhasil');
    }

    //DELETE
    public function kendaraanDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= kendaraan::find($id);
        $deleteData->delete();

        return redirect()->route('user.view')->with('info', 'Delete User berhasil');
    }
}
