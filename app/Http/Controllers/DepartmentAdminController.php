<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Department;

class DepartmentAdminController
{
    public function index()
    {
        $departments = Department::all();
        return view('department-admin', [
            'title' => 'department',
            'department' => $departments->load('grades')

            // 'department' => 'Departments',
            // 'departments' => Department::all()
        ]);
    }

}
