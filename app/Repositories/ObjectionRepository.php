<?php


namespace App\Repositories;


use App\Objection;

class ObjectionRepository
{

public function list($id){

    // son 5 veri datatable ile json yapılabilir daha fazlası için
    $datas = Objection::where('user_id',$id)->orderBy("created_at","desc")->limit(5)->get()->toJson();

    return $datas;
}
public function create($datas){

    $create = Objection::create($datas);

    if ($create){
        return "ok";
    }else{
        return "fail";
    }


}
public function delete($id){

    $delete = Objection::destroy($id);
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
public function update($datas,$id){

    $update = Objection::where('id',$id)->update($datas);

    if ($update){
        echo "ok";
    }else{
        echo "fail";
    }
}

}
