<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Http\Requests\Validation;
use App\Teacher;
use Illuminate\Http\Request;
use App\Repositories\TeacherRepository;

class TeacherController extends Controller
{
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    public function index()
    {
        $classe = Classe::all();
        return view('admin.teachers.list', compact('classe'));
    }

    public function apiGetGV()
    {
        $teachers = $this->teacherRepository->all();

        return response()->json($teachers);
    }

    public function create(Validation $request)
    {
       $teachers = $this->teacherRepository->createTeacher($request);

       return response()->json($teachers);
    }


    public function show($id)
    {
        $show = $this->teacherRepository->showTeacher($id);

        return response()->json($show);
    }


    public function update(Validation $request, $id)
    {
        $teachers = $this->teacherRepository->update($request, $id);

        return response()->json($teachers);
    }


    public function destroy($id)
    {
        return $this->teacherRepository->deleteTeacher($id);
    }
}
