<?php

namespace App\Http\Controllers;

use App\Repositories\HomeRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    private $homeRepository;
    public function __construct(HomeRepository $homeRepository){

        $this->homeRepository = $homeRepository;
    }
    public function student_info(Request $request){

        $send = $this->homeRepository->student_info($request->id);
        return $send;

    }
    public function update_student(Request  $request){

        $datas = [
          'name'=>$request->name,
          'email'=>$request->email,
          'class_teacher'=>$request->class_teacher,
          'class_name'=>$request->class_name
        ];

        // update işlemi
$send = $this->homeRepository->update_student($datas,$request->id);
return $send;

    }

    public function update_profile(Request $request){


 $send = $this->homeRepository->update_profile($request);

return $send;

    }

}
