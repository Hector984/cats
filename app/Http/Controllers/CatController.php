<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use App\Http\Resources\CatResource;

class CatController extends Controller
{
    public function index(){

        return CatResource::collection(Cat::inRandomOrder()->get());
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

        $image = $request->file('img');
        $image->move(public_path('/images'), $image->getClientOriginalName());

        $cat = Cat::create([
            'name' => $request->get('catName'),
            'description' => $request->get('description'),
            'img_name' => $image->getClientOriginalName(),
            'img_path' => "/images/".$image->getClientOriginalName()
        ]);
        
        return response()->json([
            'Success' => 'New cat created'
        ],201);
    }
}
