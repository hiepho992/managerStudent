<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Http\Requests\Validation;
use App\Classe;

class ClasseRepository implements ClasseRepositoryInterface{

    public function all(){

        return Classe::all();
    }

}
?>
