<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $data = ['delete_at'];

    public function classe(){
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    public function scores(){

        return $this->hasMany(Score::class, 'student_id', 'id');
    }

}
