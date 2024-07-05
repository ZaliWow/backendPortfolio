<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    
    public function index(): JsonResponse
    { 
        return response()->json(Comment::all(), 200);
    }
    public function store(CommentRequest $request): JsonResponse
    {
        $comment = Comment::create($request->all());
        return response()->json([
            'message' => 'Comment created', 
            'data'=> $comment], 201);
    
    }   
    public function show(string $id): JsonResponse
    {
       
        return response()->json(Comment::find($id), 200);
    }  
    public function update(CommentRequest $request, string $id): JsonResponse
    {
        $comment = Comment::find($id);
        $comment->update($request->all());
        return response()->json([
            'message' => 'Comment updated',
            'data'=> $comment
        ], 200);
    }
    public function destroy(string $id):JsonResponse
    {
        Comment::destroy($id);      
        return response()->json(['message' => 'Comment deleted'], 200);
    }
}
