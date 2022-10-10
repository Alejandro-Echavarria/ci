<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;
use Illuminate\Support\Str;

// Import the validations file
use App\Http\Requests\Admin\CollegeRequest;
class CollegeController extends Controller
{
    public function index()
    {
        return view('admin.colleges.index');
    }

    public function create()
    {
        return view('admin.colleges.create');
    }

    public function store(CollegeRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($data['name']);

        $college = College::create($data);

        return redirect()->route('admin.colleges.edit', $college)->with('info', 'La universidad ('. $college->name .') se creó con éxito.');
    }

    public function edit(College $college)
    {
        return view('admin.colleges.edit', compact('college'));
    }

    public function update(CollegeRequest $request, College $college)
    {
        $data = $request->all();

        $college->update($data);

        return redirect()->route('admin.colleges.edit', $college)->with('info', 'La universidad ('. $college->name .') se actualizó con éxito.');
    }

    public function destroy(College $college)
    {
        //
    }
}
