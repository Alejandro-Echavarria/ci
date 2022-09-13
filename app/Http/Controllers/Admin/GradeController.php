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

    public function update(GradeRequest $request, Grade $grade)
    {
        $arrRequest = $request->all();
        $arrRequest['name'] = strtoupper($request['name']);

        $grade->update($arrRequest);

        return redirect()->route('admin.grades.edit', $grade)->with('info', 'La calificación se actualizó con éxito.');
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
