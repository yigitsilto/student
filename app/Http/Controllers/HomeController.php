<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function student_info(Request $request){

        $id = $request->id;

        $user_info = User::where('id',$id)->first();

        return $user_info;
    }
    public function update_student(Request  $request){

        $datas = [
          'name'=>$request->name,
          'email'=>$request->email,
          'class_teacher'=>$request->class_teacher,
          'class_name'=>$request->class_name
        ];

        $update = User::where('id',$request->id)->update($datas);
        if ($update){
            return "ok";
        }else{
            return "fail";
        }


    }

    public function update_profile(Request $request){


        if ($request->password == "null"){
            $datas = [
                'name'=>$request->name,
                'email'=>$request->email,
            ];

            $update = User::where('id',$request->id)->update($datas);
            if ($update){
                return "ok";
            }else{
                return "fail";
            }

        }else{

            $datas = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
            ];

            $update = User::where('id',$request->id)->update($datas);
            if ($update){
                return "ok";
            }else{
                return "fail";
            }



        }



    }

}
