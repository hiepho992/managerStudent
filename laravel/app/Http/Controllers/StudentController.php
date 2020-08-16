<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Http\Requests\ValidateStudent;
use App\Student;
use Illuminate\Http\Request;
use App\Repositories\StudentRepository;

class StudentController extends Controller
{
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        $classe = Classe::all();

        return view('admin.students.list', compact('classe'));
    }


    public function create(ValidateStudent $request)
    {
        $students = $this->studentRepository->createStudent($request);

        return response()->json($students, 200);
    }

    public function show()
    {
        $students = $this->studentRepository->all();

        return response()->json($students);
    }


    public function get($id)
    {
        $students = $this->studentRepository->getStudent($id);

        return response()->json($students, 200);
    }


    public function update(ValidateStudent $request, $id)
    {
        $students = $this->studentRepository->updateStudent($request, $id);

        return response()->json($students, 200);
    }


    public function destroy($id)
    {
        return $this->studentRepository->delete($id);
    }
}
