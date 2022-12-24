<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\hewan;

class hewanController extends Controller
{
    public function hewanView() {
        // $allDataUser=User::all();
        $data['allDataHwn']=hewan::all();
        return view('backend.hewan.view_user', $data);
    }
    //CREATE
    public function hewanAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.hewan.add_user');
    }

    //FUNCTION MELAKUKAN CREATE
    public function hewanStore(Request $request) {

        $data=new hewan();
        $data->nama=$request->nama;
        $data->jenis=$request->jenis;
        $data->harga=$request->harga;
        $data->umur=$request->umur;
        $data->save();

        return redirect()->route('hewan.view')->with('info', 'Tambah Hewan berhasil');
    }

    //update
    public function hewanEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= hewan::find($id);
        return view('backend.hewan.edit_user', compact('editData'));
    }

    public function hewanUpdate(Request $request, $id) {
       

        $data=hewan::find($id);
        $data->nama=$request->nama;
        $data->jenis=$request->jenis;
        $data->harga=$request->harga;
        $data->umur=$request->umur;
        // $data->password=bcrypt($request->password);
        $data->save();

        return redirect()->route('hewan.view')->with('info', 'Update Hewan berhasil');
    }

    //DELETE
    public function hewanDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= hewan::find($id);
        $deleteData->delete();

        return redirect()->route('hewan.view')->with('info', 'Delete Hewan berhasil');
    }
}
