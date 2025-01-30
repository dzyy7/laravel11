<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        // Use paginate instead of get
        $students = Student::with(['grade', 'department'])
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                    ->orWhereHas('grade', function ($q) use ($query) {
                        $q->where('name', 'like', '%' . $query . '%');
                    });
            })
            ->paginate(15); // Fetch 15 students per page

        return view('admin_view.student.student-admin2', [
            'title' => 'Student',
            'students' => $students,
            'searchQuery' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_view.student.create', [
            "title" => "Create New Data",
            'grades' => Grade::all(),
            'departments' => Department::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'grade_id'    => 'required|exists:grades,id',
            'department_id'    => 'required|exists:departments,id',
            'email'       => 'required|email|max:255',
            'address'     => 'required|string|max:255',
        ]);

        Student::create($validated);

        return redirect('/admin/students')->with('success', 'Student created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Ambil data grades untuk pilihan pada form
        $grades = Grade::all();

        // Tampilkan halaman edit dengan data siswa dan grades
        return view('admin_view.student.edit', [
            'title' => 'Edit Student Data',
            'student' => $student,
            'grades' => $grades
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required|email|max:255',
            'address'   => 'required|string|max:255',
        ]);

        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Update data siswa
        $student->update([
            'name'     => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'email'    => $validated['email'],
            'address'  => $validated['address'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Hapus data siswa
        $student->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student deleted successfully.');
    }
}
