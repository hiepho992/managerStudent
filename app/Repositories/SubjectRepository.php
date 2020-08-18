<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Http\Requests\Validation;
use App\Subject;
use Mockery\Matcher\Subset;

class SubjectRepository implements SubjectReposytoryInterface{

    public function all(){

        return Subject::all();
    }

    public function createSubject($request){
        $subject = new Subject();
        $subject->name = $request->subName;
        $subject->save();

       return $subject;
    }

    public function showId($id){

        return Subject::findOrFail($id);
    }

    public function update($request, $id){
        $subject = Subject::findOrFail($id);
        $subject->name = $request->subName;
        $subject->save();

        return $subject;
    }

    public function delete($id){

        return Subject::destroy($id);
    }

}
?>
