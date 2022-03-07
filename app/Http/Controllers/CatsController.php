<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatsController extends Controller
{
    public function index(){

        return response()->json(200);
    }

    public function store(Request $request){
        $data = $request->validate([
            'img' => 'required'
        ]);

        dd($data['img']);
    }
}
