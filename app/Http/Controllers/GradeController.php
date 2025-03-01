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
        if ($validated['grade'] > 3) {
            $status = 'Failed';
        } else {
            $status = 'Passed';
        }
        $grade = Grade::create([
            'grade' => $validated['grade'],
            'status' => $status,
        ]);

        Enrollment::where('id', $validated['enrollment_id'])
            ->update(['grade_id' => $grade->id]);
        return redirect('students')->with('success', 'Student graded Successfully');
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

        $validated = $request->validated();
        if ($validated['grade'] > 3) {
            $validated['status'] = 'Failed';
        } else {
            $validated['status'] = 'Passed';
        }
        $grade->update($validated);

        return redirect('students')->with('success', 'Student graded Successfully Updated');
    }
    public function destroy(Grade $grade)
    {
        // Step 1: Remove the grade_id from enrollments
        Enrollment::where('grade_id', $grade->id)->update(['grade_id' => null]);

        // Step 2: Delete the grade from the grades table
        $grade->delete();
        return redirect('students')->with('success', 'Student grade deleted Successfully ');
    }
}
