<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $subjects = Subject::all();
        $subjectCount = count($subjects);
        $classes = Classe::all();
        $classeCount = count($classes);
        $students = Student::all();
        $studentCount = count($students);
        $teachers = Teacher::all();
        $countTeacher = count($teachers);

        return view('admin.layouts.dashboard', compact('classeCount', 'subjectCount', 'countTeacher', 'studentCount'));
    }

    // public function register(){

    //     return view('auth.register');
    // }

}
