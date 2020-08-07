<?php
namespace App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Validation;

use App\Teacher;

class TeacherRepository{

    public function all(){

        $teachers = Teacher::all();

        return $teachers;
    }

    public function createTeacher(){
        // $data = Validation::make(request()->all());
        // $teachers = Teacher::create($data);
        $teachers = new Teacher();
        $teachers->fullName = request()->fullName;
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
        $teachers->image = request()->inputFile;
        if(request()->hasFile('inputFile')){
            $imageName = rand(1,9999). '.' .request()->file('inputFile')->getClientOriginalExtension();
            request()->file('inputFile')->storeAs('public/images', $imageName);
            $teachers->image = $imageName;
        }
        $teachers->save();

        return $teachers;

    }

    public function showTeacher($id){

        return Teacher::findOrfail($id);

    }

    public function deleteTeacher($id){

        return Teacher::destroy($id);
    }

    public function update($id){
        $teachers = Teacher::findOrFail($id);
        // $data = request()->all();
        $teachers->fullName = request()->fullName;
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
        $teachers->image = request()->inputFile;

        // if(request()->hasFile('inputFile')){
        //     $currentImg = $teachers->image;
        //     if($currentImg){
        //         Storage::delete(['/public/'. $currentImg]);
        //     }
        //     $image = request()->file('inputFile');
        //     $path = $image->storeAs('images', 'public');
        //     $teachers->image = $path;
        // }
        // $teachers->update($data);
        $teachers->save();

        return $teachers;
    }
}
?>
