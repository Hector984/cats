<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    public function index(){

        return response()->json(200);
    }

    public function show($id){
        
        $cat = Cat::findOrFail($id);
    }

    public function create(){

    }

    public function store(Request $request){
        
        $request->validate([
            'catName' => 'required',
            'description' => 'required',
        ]);

        
        $cat = Cat::create([
            'name' => $request->get('catName'),
            'description' => $request->get('description'),
            'img_name' => $request->file('img')->getClientOriginalName(),
            'img_path' => $request->file('img')->store('cats', 'public')
        ]);
        
        return response()->json([
            'Success' => 'New cat created'
        ],201);
    }

    
}
