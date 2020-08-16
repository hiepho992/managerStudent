<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Http\Requests\ValidateClasse;
use App\Repositories\ClasseRepository;
use App\Subject;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    private $classeRepository;

    public function __construct(ClasseRepository $classeRepository)
    {
        $this->classeRepository = $classeRepository;
    }

    public function index()
    {
        $subject = Subject::all();
        return view('admin.classes.list', compact('subject'));
    }

    public function create(ValidateClasse $request)
    {
        $classe = $this->classeRepository->createClasse($request);

        return response()->json($classe, 200);
    }


    public function show()
    {
        $classe = $this->classeRepository->all();

        return response()->json($classe);
    }


    public function edit($id)
    {
        $classe = $this->classeRepository->editClasse($id);

        return response()->json($classe);
    }


    public function update(ValidateClasse $request, $id)
    {
        $classe = $this->classeRepository->updateClasse($request, $id);

        return response()->json($classe, 200);
    }

    public function destroy($id)
    {
        return $this->classeRepository->deleteClasse($id);
    }

    public function getStudent($id){
        $students = $this->classeRepository->getStudent($id);

        return response()->json($students);
    }
}
