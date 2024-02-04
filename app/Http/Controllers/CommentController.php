<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //

    public function create(Request $request)
    {
        //
        $rules = [
            'name' => 'required|string',
            'content' => 'required',
            'recipe_id' => 'required'
        ];

        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $comment = Comment::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $comment
        ]);

    }
}
