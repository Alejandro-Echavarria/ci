<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        
        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        //
    }

    public function store(Request $grade)
    {
        //
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(Request $request, $grade)
    {
        //
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
