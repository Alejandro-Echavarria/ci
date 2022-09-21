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

    public function store(QuaterRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $quater = Quater::create($data);

        foreach ($request->subjects as $subject) {
            
            $quater->subjects()->create(['grade_id' => $subject]);
        }

        return redirect()->route('admin.quaters.edit', $quater)->with('info', 'El cuatrimestre ('. $quater->name .') se creó con éxito.');
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
