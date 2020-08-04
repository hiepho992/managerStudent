<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $data = ['delete_at'];

    public function scores(){

        return $this->hasMany(Score::class, 'subject_id', 'id');
    }

}
