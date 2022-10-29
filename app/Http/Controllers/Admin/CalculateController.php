<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculateController extends Controller
{
    public function ic(Request $request)
    {
        return response()->json('KLK');
    }
}
