<?php
namespace App\Repositories;

use App\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Validation;
use App\Student;
use App\Teacher;

class TeacherRepository implements TeacherRepositoryInterface{

    public function all(){

        $teachers = Teacher::select('teachers.*', 'classes.name AS nameClass')
        ->join('classes', 'teachers.classe_id', '=' ,'classes.id')
        ->get();

        return $teachers;
    }

    public function createTeacher($request){
        $teachers = new Teacher();
        $teachers->fullName = $request->fullName;
        $teachers->dateOfBirth = $request->dateOfBirth;
        $teachers->gender = $request->gender;
        $teachers->nation = $request->nation;
        $teachers->phone = $request->phone;
        $teachers->email = $request->email;
        $teachers->address = $request->address;
        $teachers->salary = $request->salary;
        $teachers->specialize = $request->specialize;
        $teachers->image = $request->image64;
        $teachers->classe_id = $request->classe;
        $teachers->save();

        return $teachers;
    }

    public function showTeacher($id){

        return Teacher::findOrfail($id);

    }

    public function deleteTeacher($id){

        return Teacher::destroy($id);
    }

    public function update( $request ,$id){
        $teachers = Teacher::findOrFail($id);
        $teachers->fullName = $request->fullName;
        $teachers->dateOfBirth = $request->dateOfBirth;
        $teachers->gender = $request->gender;
        $teachers->nation = $request->nation;
        $teachers->phone = $request->phone;
        $teachers->email = $request->email;
        $teachers->address = $request->address;
        $teachers->specialize = $request->specialize;
        $teachers->salary = $request->salary;
        $teachers->active = $request->action;
        $teachers->image = $request->image64;
        $teachers->classe_id = $request->classe;
        $teachers->update();

        return $teachers;
    }
}
?>
