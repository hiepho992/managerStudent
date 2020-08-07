<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classe extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $data = ['delete_at'];

    public function teacher(){

        return $this->hasOne(Teacher::class, 'classe_id', 'id');
    }

    public function students(){

        return $this->hasMany(Student::class, 'classe_id', 'id');
    }

    public function subjects(){

        return $this->hasMany(Subject::class, 'classe_id', 'id');
    }

}
