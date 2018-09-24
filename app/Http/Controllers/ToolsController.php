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

        $details = [
            'name'=>$request->name,
            'height'=>$request->height.' cm',
            'weight'=>$request->weight.' kgs',
            'age'=>$request->age.' years',
            'gender'=>$request->sex
        ];
        $details = \GuzzleHttp\json_encode($details);

        return view('tools.bmi', compact('details'));
    }

}
