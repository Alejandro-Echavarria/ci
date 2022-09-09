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
        return response('aaaa');
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
        //
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
