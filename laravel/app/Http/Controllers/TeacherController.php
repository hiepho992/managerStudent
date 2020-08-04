<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(10);
        return view('admin.teachers.list', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $teachers = new Teacher();
        $teachers->fullName = $request->name;
        $teachers->dateOfBirth = $request->dateOfBirth;
        $teachers->gender = $request->gender;
        $teachers->nation = $request->nation;
        $teachers->phone = $request->phone;
        $teachers->email = $request->email;
        $teachers->address = $request->address;
        $teachers->faName = $request->faName;
        $teachers->faPhone = $request->faPhone;
        $teachers->moName = $request->moName;
        $teachers->moPhone = $request->moPhone;
        $teachers->specialize = $request->specialize;

        if($request->hasFile('inputFile')){
            $imageName = rand(1,9999). '.' .$request->file('inputFile')->getClientOriginalExtension();
            $request->file('inputFile')->storeAs('public/images', $imageName);
            $teachers->image = $imageName;
        }

        $teachers->save();

        return response()->json($teachers);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Teacher::destroy($id);
    }
}
