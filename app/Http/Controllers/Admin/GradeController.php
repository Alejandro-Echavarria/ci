<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

// Import the validations file
use App\Http\Requests\Admin\GradeRequest;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all()->where('status !=', 0);
        
        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.grades.create');
    }

    public function store(GradeRequest $request)
    {
        $data = $request->all();
        $data['name'] = strtoupper($data['name']);

        $grade = Grade::create($data);

        return redirect()->route('admin.grades.edit', $grade)->with('info', 'La calificación ('. $grade->name .') se creó con éxito.');
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(GradeRequest $request, Grade $grade)
    {
        $data = $request->all();
        $data['name'] = strtoupper($data['name']);

        $grade->update($data);

        return redirect()->route('admin.grades.edit', $grade)->with('info', 'La calificación ('. $grade->name .') se actualizó con éxito.');
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
