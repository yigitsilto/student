<?php

namespace App\Http\Controllers;

use App\Objection;
use App\Repositories\ObjectionRepository;
use Illuminate\Http\Request;

class ObjectionController extends Controller
{

   private $objectionRepository;
    public function __construct(ObjectionRepository $objectionRepository)
    {
// repository işlemi
        $this->objectionRepository = $objectionRepository;

    }

    public function create(Request  $request){

        $datas = [
          'user_id'=>$request->user_id,
            'explanation'=>$request->explanation,
            'lesson_date' => $request->lesson_date,
            'lesson_name' => $request->lesson_name,
        ];
        // ekleme işlemi
        $send = $this->objectionRepository->create($datas);

        return $send;
    }
    public function list($id){

      // objection repositories listelemek için
        $datas = $this->objectionRepository->list($id);
        return $datas;

    }
    public function delete(Request  $request){

        // silme işlemi
        $send = $this->objectionRepository->delete($request->id);
        return $send;

    }
    public function detail($id){

        // detay listeleme
      $send = $this->objectionRepository->detail($id);

        return $send;

    }
    public function update(Request $request){

        // güncelleme işlemi
        $datas = $request->except("id");
        $send = $this->objectionRepository->update($datas,$request->id);

         return $send;



    }
}
