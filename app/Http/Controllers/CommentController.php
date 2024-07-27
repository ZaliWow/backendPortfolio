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
        $comments = Comment::with(['replies.user', 'user'])
            ->whereNull('parent_id')
            ->get();

        return response()->json($comments);
    }
    public function store(CommentRequest $request): JsonResponse
    {
       
        $validatedData = $request->validate([
            'comment' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'parent_id' => 'nullable|integer|exists:comments,id'
        ]);

        $comment = new Comment();
        $comment->user_id = $validatedData['user_id'];
        $comment->comment = $validatedData['comment'];
        $comment->parent_id = $validatedData['parent_id'] ?? null;
        $comment.save();

        return response()->json(['message' => 'Comment created successfully'], 201);
    
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
