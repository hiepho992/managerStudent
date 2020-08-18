<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Http\Requests\Validation;
use App\Classe;
use App\Student;

class ClasseRepository implements ClasseRepositoryInterface{

    public function all(){

        $classe = Classe::select('classes.*',
        'subjects.name AS class'
        )
        ->join('subjects', 'classes.subject_id', '=', 'subjects.id' )
        ->get();

        return $classe;
    }

    public function createClasse($request){
        $classe = new Classe();
        $classe->name = $request->name;
        $classe->date_start = $request->date_start;
        $classe->date_end = $request->date_end;
        $classe->subject_id = $request->subject;
        $classe->save();

        return $classe;
    }

    public function editClasse($classeId){

        return Classe::findOrFail($classeId);
    }

    public function updateClasse($request, $classeId){
        $classe = Classe::findOrFail($classeId);
        $classe->name = $request->name;
        $classe->date_start = $request->date_start;
        $classe->date_end = $request->date_end;
        $classe->subject_id = $request->subject;
        $classe->save();

        return $classe;
    }

    public function deleteClasse($classeId){

        return Classe::destroy($classeId);
    }

    public function getStudent($id){
        $student = Student::where('classe_id', $id)->with('classe')->get();

        return $student;
    }
}
?>
