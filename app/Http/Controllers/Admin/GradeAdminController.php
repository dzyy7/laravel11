<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GradeAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $grades = Grade::with(['department', 'students'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhereHas('department', function ($deptQuery) use ($query) {
                        $deptQuery->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->get();

        return view('admin_view.grade.grade-admin2', [
            'title' => 'Grade',
            'grades' => $grades,
            'searchQuery' => $query,
        ]);
    }
    public function create()
    {
        $departments = Department::all();
        return view('admin_view.grade.create-grade', [
            'title' => 'Create New Grade',
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        Grade::create($validated);

        return redirect('/admin/grades')->with('success', 'Grade created successfully.');
    }

    public function edit(string $id)
    {
        $grade = Grade::findOrFail($id);
        $departments = Department::all();

        return view('admin_view.grade.edit-grade', [
            'title' => 'Edit Grade',
            'grade' => $grade,
            'departments' => $departments,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update($validated);

        return redirect('/admin/grades')->with('success', 'Grade updated successfully.');
    }

    public function destroy(string $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect('/admin/grades')->with('success', 'Grade deleted successfully.');
    }
}
