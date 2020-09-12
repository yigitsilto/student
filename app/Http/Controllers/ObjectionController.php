<?php

namespace App\Http\Controllers;

use App\Objection;
use Illuminate\Http\Request;

class ObjectionController extends Controller
{
    public function create(Request  $request){

        $datas = [
          'user_id'=>$request->user_id,
            'explanation'=>$request->explanation,
            'lesson_date' => $request->lesson_date,
            'lesson_name' => $request->lesson_name,
        ];

        $create = Objection::create($datas);

        if ($create){
            return "ok";
        }else{
            return "fail";
        }

    }
    public function list($id){

        // son 5 veri datatable ile json yapılabilir daha fazlası için
        $datas = Objection::where('user_id',$id)->orderBy("created_at","desc")->limit(5)->get();

        return $datas->toJson();

    }
    public function delete(Request  $request){


        $delete = Objection::destroy($request->id);
        if ($delete){
            return "ok";
        }else{
            return "fail";
        }
    }
    public function detail($id){

        $datas = Objection::where('id',$id)->first();

        return $datas;

    }
    public function update(Request $request){

        $datas = $request->except("id");
        $update = Objection::where('id',$request->id)->update($datas);

        if ($update){
            echo "ok";
        }else{
            echo "fail";
        }



    }
}
