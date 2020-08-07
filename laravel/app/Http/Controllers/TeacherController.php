<?php

namespace App\Http\Controllers;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.teachers.list');
    }

    public function apiGetGV()
    {
        $teachers = $this->teacherRepository->all();

        return response()->json($teachers);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = $this->teacherRepository->createTeacher();

        return response()->json($teachers);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = $this->teacherRepository->showTeacher($id);

        return response()->json($show);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $teachers = $this->teacherRepository->update($id);

        return response()->json($teachers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->teacherRepository->deleteTeacher($id);
    }
}
