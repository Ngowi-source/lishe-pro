<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function bmr()
    {
        return view('tools.bmr');
    }

    public function bmresults(Request $request)
    {
        $this->validate($request, [
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'age' => 'required|integer',
            'sex' => 'required|in:Female,Male'
        ]);

        if($request->sex == 'Male')
        {
            $bmr = (int)(66 + (13.7 * $request->weight) + (5 * $request->height) - (6.8 * $request->age));
        }
        else
        {
            $bmr = (int)(655 + (9.6 * $request->weight) + (1.9 * $request->height) - (4.7 * $request->age));
        }

        return view('tools.bmr', compact('bmr'));
    }

}
