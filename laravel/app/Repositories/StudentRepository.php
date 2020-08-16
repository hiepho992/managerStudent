<?php
namespace App\Repositories;

use App\Student;

class StudentRepository implements StudentRepositoryInterface{

    public function all(){
        $students = Student::select('students.*', 'classes.name AS classe')
        ->join('classes', 'students.classe_id', '=', 'classes.id')
        ->get();

        return $students;
    }

    public function createStudent($request){
        $students = new Student();
        $students->fullName = $request->fullName;
        $students->dateOfBirth = $request->dateOfBirth;
        $students->gender = $request->gender;
        $students->nation = $request->nation;
        $students->phone = $request->phone;
        $students->email = $request->email;
        $students->address = $request->address;
        $students->date_start = $request->date_start;
        $students->date_end = $request->date_end;
        $students->image = $request->image64;
        $students->classe_id = $request->classe;
        $students->save();

        return $students;
    }

    public function getStudent($studentId){

        return Student::findOrFail($studentId);
    }

    public function updateStudent($request ,$id){
        $students = Student::findOrFail($id);
        $students->fullName = $request->fullName;
        $students->dateOfBirth = $request->dateOfBirth;
        $students->gender = $request->gender;
        $students->nation = $request->nation;
        $students->phone = $request->phone;
        $students->email = $request->email;
        $students->address = $request->address;
        $students->date_start = $request->date_start;
        $students->date_end = $request->date_end;
        $students->active = $request->action;
        $students->image = $request->image64;
        $students->classe_id = $request->classe;
        $students->update();

        return $students;
    }

    public function delete($studentId){
        return Student::destroy($studentId);
    }
}
?>
