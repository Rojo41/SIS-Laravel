<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Enrollment;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        $validated = $request->validated();
        $grade = Grade::create([
            'grade' => $validated['grade'],
            'status' => "Passed",
        ]);

        // Step 2: Update the enrollment with the grade_id
        Enrollment::where('id', $validated['enrollment_id'])
            ->update(['grade_id' => $grade->id]);
        return redirect('students')->with('success', 'Student added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($studentId)
    {
        $grades = Grade::where('student_id', $studentId)->with('subject')->get();

        return response()->json($grades);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        //
    }
    public function destroy(Grade $grade)
    {
        //
    }
}
