<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;

class CatController extends Controller
{
    public function index(){

        //return Cat::latest()->get();
        return CatResource::collection(Cat::latest()->get());
    }

    public function show($id){
        
        $cat = Cat::findOrFail($id);
    }

    /**
     * Store a cat
     */
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
