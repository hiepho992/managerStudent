<?php
namespace App\Repositories;
use Illuminate\Http\Request;

use App\Teacher;

class TeacherRepository{

    public function all(){

        $teachers = Teacher::all();

        return $teachers;
    }

    public function createTeacher(){
        // $data = request()->all();
        // $teachers = Teacher::create($data);
        $teachers = new Teacher();
        $teachers->fullName = request()->name;
        $teachers->dateOfBirth = request()->dateOfBirth;
        $teachers->gender = request()->gender;
        $teachers->nation = request()->nation;
        $teachers->phone = request()->phone;
        $teachers->email = request()->email;
        $teachers->address = request()->address;
        $teachers->faName = request()->faName;
        $teachers->faPhone = request()->faPhone;
        $teachers->moName = request()->moName;
        $teachers->moPhone = request()->moPhone;
        $teachers->specialize = request()->specialize;

        if(request()->hasFile('inputFile')){
            $imageName = rand(1,9999). '.' .request()->file('inputFile')->getClientOriginalExtension();
            request()->file('inputFile')->storeAs('public/images', $imageName);
            $teachers->image = $imageName;
        }
        $teachers->save();

        return $teachers;

    }

    public function showTeacher($id){
        $show = Teacher::findOrfail($id);

        return $show;
    }

    public function deleteTeacher($id){

        return Teacher::destroy($id);
    }
}
?>
