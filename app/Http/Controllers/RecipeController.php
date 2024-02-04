<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        

        $data = Recipe::query();

        $q = $request->query('name');
        $kategori = $request->query(('kategori'));

        $data->when($q, function($query) use ($q){
            return $query->whereRaw("name LIKE '%".strtolower($q)."%'");
        });

        // $data->when($kategori, function($query) use ($kategori){
        //     return $query->where('category', '=',$kategori );
        // });
        return response()->json([
            'status' => 'success',
            'data' => $data->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $recipe = Recipe::find($id);
        if (!$recipe){
            return response()->json([
                'status'=> 'error',
                'message'=> "recipe not found"
            ], 404);
        }
        $comments = [];
        $comment = Comment::where('recipe_id', '=', $id)->get()->toArray();
        if (count($comment) > 0){
            $comments = $comment;
        }

        $recipe['comment'] = $comment;
        return response()->json([
            'status'=> 'success',
            'data'=> $recipe
            ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(recipe $recipe)
    {
        //
    }
}
