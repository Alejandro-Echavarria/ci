<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuaterRequest;
use App\Models\Quater;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function edit(Quater $quater)
    {
        return view('admin.quaters.edit', compact('quater'));
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
