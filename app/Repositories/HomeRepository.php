<?php


namespace App\Repositories;


use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class HomeRepository
{

public function student_info($id){


    $user_info = User::where('id',$id)->first();

    return $user_info;

}

public function update_student($datas,$id){

    $update = User::where('id',$id)->update($datas);
    if ($update){
        return "ok";
    }else{
        return "fail";
    }
}

public function update_profile($request){

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
