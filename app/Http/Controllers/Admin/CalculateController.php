<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quater;

class CalculateController extends Controller
{
    public function ic()
    {
        $data = Quater::with('subjects.grade')
                      ->where('user_id', auth()->user()->id)
                      ->orderBy('id', 'desc')
                      ->get();

        return response()->json($data);
    }
}
