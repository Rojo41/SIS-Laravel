<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = auth('student')->user();

        if (!$student) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }
        $grades = Grade::where('student_id', $student->id)->with('subject')->get();
        return view('studentsViews.index', compact('grades'));
    }
}
