<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\perpustakaan;

class perpustakaanController extends Controller
{   //READ
    public function perpustakaanView() {
        // $allDatappt=perpustakaan::all();
        $data['allDataPpt']=perpustakaan::all();
        return view('backend.perpustakaan.view_user', $data);
    }
    //CREATE
    public function perpustakaanAdd() {
        // $allDatappt=perpustakaan::all();
        // $data['allDataUser']=User::all();
        return view('backend.perpustakaan.add_user');
    }
    public function perpustakaanStore(Request $request) {

        $data=new perpustakaan();
        $data->nama=$request->nama;
        $data->email=$request->penerbit;
        $data->alamat=$request->tahun;
        $data->gender=$request->jenis;
        $data->save();

        return redirect()->route('perpustakaan.view')->with('info', 'Tambah Buku berhasil');
    }

    //update
    public function perpustakaanEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= perpustakaan::find($id);
        return view('backend.perpustakaan.edit_user', compact('editData'));
    }

    public function perpustakaanUpdate(Request $request, $id) {
        $validatedData=$request->validate([
            'email' => 'required|unique:users',
            'textNama' => 'required'
        ]);

        $data=perpustakaan::find($id);
        $data->usertype=$request->selectUser;
        $data->name=$request->textNama;
        $data->email=$request->email;
        // $data->password=bcrypt($request->password);
        $data->save();

        return redirect()->route('perpustakaan.view')->with('info', 'Update Buku berhasil');
    }

    //DELETE
    public function perpustakaanDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= perpustakaan::find($id);
        $deleteData->delete();

        return redirect()->route('perpustakaan.view')->with('info', 'Delete buku berhasil');
    }

}
