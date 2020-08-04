<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{

    protected $guarded = [];

    use SoftDeletes;
    protected $data = ['delete_at'];

    public function student(){

        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function subject(){

        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
