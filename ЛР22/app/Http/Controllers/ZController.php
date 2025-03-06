<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->get('x'))) {
            return view('z6-get')->with('message', 'Введите данные');
        }

        if (4 - pow($request->get('x'), 3) < 0) {
            return view('z6-get')->with('message', 'Корень из отрицательного');
        }

        return view('z6-get')->with('message', sqrt(4 - pow($request->get('x'), 3)));
    }
}
