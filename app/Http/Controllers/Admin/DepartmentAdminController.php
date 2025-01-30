<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Department;

class DepartmentAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Fetch departments with search functionality
        $departments = Department::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%');
        })->get();

        return view('admin_view.department.department-admin2', [
            'title' => 'Departments',
            'departments' => $departments->load('grades'),
            'searchQuery' => $query,
        ]);
    }

    public function create()
    {
        return view('admin_view.department.create-department', [
            'title' => 'Create Department',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string|max:255',
        ]);

        Department::create($validated);

        return redirect('/admin/departments')->with('success', 'Department created successfully.');
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        return view('admin_view.department.edit-department', [
            'title' => 'Edit Department',
            'department' => $department,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'nullable|string|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update($validated);

        return redirect('/admin/departments')->with('success', 'Department updated successfully.');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/admin/departments')->with('success', 'Department deleted successfully.');
    }
}
