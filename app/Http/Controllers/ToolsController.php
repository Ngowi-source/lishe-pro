<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function bmi()
    {
        return view('tools.bmi');
    }

    public function bmiresults(Request $request)
    {
        $this->validate($request, [
            'name' => 'optional',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'age' => 'required|integer',
            'sex' => 'required|in:Female,Male'
        ]);

        $details = $request;

        return view('tools.bmi', compact('details'));
    }

}
