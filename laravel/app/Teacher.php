<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $data = ['delete_at'];

    public function classe(){
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    public function students(){
        return $this->hasManyThrough(Student::class, Classe::class, 'teacher_id', 'classe_id', 'id');
    }
}
