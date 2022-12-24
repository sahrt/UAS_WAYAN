<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\barang;

class barangController extends Controller
{
    public function barangView() {
        // $allDataUser=User::all();
        $data['allDataBrn']=barang::all();
        return view('backend.barang.view_user', $data);
    }
    //CREATE
    public function barangAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.barang.add_user');
    }

    //FUNCTION MELAKUKAN CREATE
    public function barangStore(Request $request) {

        $data=new barang();
        $data->nama=$request->nama;
        $data->email=$request->email;
        $data->alamat=$request->alamat;
        $data->gender=$request->gender;
        $data->umur=$request->umur;
        $data->save();

        return redirect()->route('barang.view')->with('info', 'Tambah Barang berhasil');
    }

    //update
    public function barangEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= barang::find($id);
        return view('backend.barang.edit_user', compact('editData'));
    }

    public function barangUpdate(Request $request, $id) {
       

        $data=barang::find($id);
        $data->nama=$request->nama;
        $data->perusahaan=$request->perusahaan;
        $data->jumlah=$request->jumlah;
        $data->jenis=$request->jenis;
        // $data->password=bcrypt($request->password);
        $data->save();

        return redirect()->route('barang.view')->with('info', 'Update Barang berhasil');
    }

    //DELETE
    public function barangDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= karyawan::find($id);
        $deleteData->delete();

        return redirect()->route('barang.view')->with('info', 'Delete Barang berhasil');
    }
}
