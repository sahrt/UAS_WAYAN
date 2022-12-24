<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NameTable;

class NameTableController extends Controller
{
    public function viewAll (){
        $alldata = NameTable::orderBy('id', 'desc')->get();

        return response()->json($alldata, 200);
    }

    public function addNameTable (Request $request){
        $request->validate([
            'kolom_1' => 'required',
            'kolom_2' => 'required',
            'kolom_3' => 'required'
        ]);
        $model = new NameTable;
        $model->kolom_1 = $request->kolom_1;
        $model->kolom_2 = $request->kolom_2;
        $model->kolom_3 =  $request->kolom_3;
        $model->save();
        return response()->json($model,'201');
     }

     public function editNameTable (Request $request){
        $request->validate([
            'kolom_1' => 'required',
            'kolom_2' => 'required',
            'kolom_3' => 'required'
        ]);
        $model =  NameTable::where('id', $request->id)->first();
        $model->kolom_1 = $request->kolom_1;
        $model->kolom_2 = $request->kolom_2;
        $model->kolom_3 =  $request->kolom_3;
        $model->save();
        return response()->json($model,'201');
     }
     public function deleteNameTable (Request $request){
        $model = NameTable::where('id',  $request->id)->first();

        if (!empty($model)) {
            $model->delete();
            return response()->json($model, 200);
        } else {
            return response()->json([
                'error' => 'data tidak ditemukan'
            ], 404);
        }
     }
}
