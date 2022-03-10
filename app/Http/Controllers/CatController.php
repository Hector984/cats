<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;

class CatController extends Controller
{
    public function index(){

        return CatResource::collection(Cat::latest()->get());
    }

    public function show(Cat $cat){
        
        return new CatResource($cat);
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
