<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objection extends Model
{
    protected $table = "objection";
    protected $fillable = ['user_id','id','explanation','lesson_date','lesson_name'];



    public function user(){
        return $this->belongsTo("App\User","user_id");
    }
}
