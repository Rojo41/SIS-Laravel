<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['studentList' => $students]);
    }

    public function create()
    {
        //
    }
    public function store(StoreStudentRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['password'] = Hash::make('password123');
            Student::create($validated);
            return redirect('students')->with('success', 'Student added Successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', "Something went wrong!");
        }
    }
    public function show(Student $student)
    {
        dd($student->all());
    }
    public function edit(Student $student) {}

    public function update(UpdateStudentRequest $request, Student $student)
    {

        try {
            $validated = $request->validated();
            $student->update($validated);
            return redirect()->back()->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Something went wrong!");
        }
    }
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('students')->with('success', 'Student Deleted Successfully');
    }
}
