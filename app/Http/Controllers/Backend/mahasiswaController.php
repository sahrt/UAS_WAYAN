<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\mahasiswa;

class mahasiswaController extends Controller
{
    public function mahasiswaView() {
        // $allDataUser=User::all();
        $data['allDataMhs']=mahasiswa::all();
        return view('backend.mahasiswa.view_user', $data);
    }
    //CREATE
    public function mahasiswaAdd() {
        // $allDataUser=User::all();
        // $data['allDataUser']=User::all();
        return view('backend.mahasiswa.add_user');
    }

    //FUNCTION MELAKUKAN CREATE
    public function mahasiswaStore(Request $request) {

        $data=new mahasiswa();
        $data->nama=$request->nama;
        $data->prodi=$request->prodi;
        $data->nim=$request->nim;
        $data->umur=$request->umur;
        $data->save();

        return redirect()->route('mahasiswa.view')->with('info', 'Tambah Mahasiswa berhasil');
    }

    //update
    public function mahasiswaEdit($id) {
        // dd('berhasil masuk ke controller edit');

        $editData= mahasiswa::find($id);
        return view('backend.mahasiswa.edit_user', compact('editData'));
    }

    public function mahasiswaUpdate(Request $request, $id) {
       

        $data=mahasiswa::find($id);
        $data->nama=$request->nama;
        $data->prodi=$request->prodi;
        $data->nim=$request->nim;
        $data->umur=$request->umur;
        // $data->password=bcrypt($request->password);
        $data->save();

        return redirect()->route('mahasiswa.view')->with('info', 'Update mahasiswa berhasil');
    }

    //DELETE
    public function mahasiswaDelete($id) {
        // dd('berhasil masuk ke controller edit');

        $deleteData= mahasiswa::find($id);
        $deleteData->delete();

        return redirect()->route('mahasiswa.view')->with('info', 'Delete mahasiswa berhasil');
    }
}
