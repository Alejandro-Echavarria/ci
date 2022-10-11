<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;

// Import the validations file
use App\Http\Requests\Admin\GradeRequest;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.grades.index')->only('index');
        $this->middleware('can:admin.grades.create')->only('create', 'store');
        $this->middleware('can:admin.grades.edit')->only('edit', 'update');
        $this->middleware('can:admin.grades.destroy')->only('destroy');
    }

    public function index()
    {        
        return view('admin.grades.index');
    }

    public function create()
    {
        return view('admin.grades.create');
    }

    public function store(GradeRequest $request)
    {
        $data = $request->all();

        $grade = Grade::create($data);

        return redirect()->route('admin.grades.edit', $grade)->with('info', 'La calificación ('. $grade->name .') se creó con éxito.');
    }

    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(GradeRequest $request, Grade $grade)
    {
        $data = $request->all();

        $grade->update($data);

        return redirect()->route('admin.grades.edit', $grade)->with('info', 'La calificación ('. $grade->name .') se actualizó con éxito.');
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
