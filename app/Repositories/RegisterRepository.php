<?php


namespace App\Repositories;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterRepository
{

    public function register($request){
        // öprenci koduna göre veli eşleştirmesi yaptık
        $student_code = $request->student_code;
        $count = User::where('student_code',$student_code)->get()->count();

        if ($count > 0){
            $get_users_info = User::where('student_code',$student_code)->first();
            // authority == 1 veli,  0 => öğrenci
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'student_id'=>$get_users_info->id,
                'authority'=>1
            ]);


// eğer user kayıt olduysa mail gönder ve giriş yap

            if($user){

                $data = [
                    'name'=>$request->name
                ];

                \Mail::to($request->email)->send(new \App\Mail\RegisterMail($request->name));
            }

           return true;


        }else{
            echo "fail_code";
        }

    }

}
