<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    public function index()
    {
        return view('admin.colleges.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(College $college)
    {
        //
    }

    public function edit(College $college)
    {
        //
    }

    public function update(Request $request, College $college)
    {
        //
    }

    public function destroy(College $college)
    {
        //
    }
}
