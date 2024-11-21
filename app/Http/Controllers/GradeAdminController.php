<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GradeAdminController
{
    public function index()
    {
        $Grades = Grade::all();
        return view('grade-admin', [
            'title' => 'Grade',
            'grades' => $Grades->load(['students', 'department']),
            // 'Grades' => Grade::all()
        ]);
    }
}
