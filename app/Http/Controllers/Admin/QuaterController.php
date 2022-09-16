<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quater;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuaterController extends Controller
{
    public function index()
    {
        return view('admin.quaters.index');
    }

    public function create()
    {
        return view('admin.quaters.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
