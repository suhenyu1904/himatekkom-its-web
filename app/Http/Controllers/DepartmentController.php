<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentProgram;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('order')
            ->with(['programs', 'members'])
            ->get();

        return view('departments.index', compact('departments'));
    }

    public function show(Department $department)
    {
        $department->load(['programs', 'members', 'events']);

        return view('departments.show', compact('department'));
    }

    public function showProgram(Department $department, DepartmentProgram $program)
    {
        // Pastikan program milik department yang benar
        if ($program->department_id !== $department->id) {
            abort(404);
        }

        return view('departments.program-show', compact('department', 'program'));
    }
}
