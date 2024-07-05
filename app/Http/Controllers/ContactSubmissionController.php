<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ContactSumission;

class ContactSubmissionController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([ContactSubmission::all(),200]);
    }
    public function store(Request $request)
    {
        $contactSubmission = ContactSubmission::create($request->all());
        return response()->json([
            'message' => 'Contact submission created',
            'data' => $contactSubmission
        ], 201);
    }
    public function show(string $id)
    {
        return response()->json([ContactSubmission::find($id),200]);
    } 
    public function update(Request $request, string $id)
    {
    $contactSubmission = ContactSubmission::find($id);
    $contactSubmission->update($request->all());
    return response()->json([
        'message' => 'Contact submission updated',
        'data' => $contactSubmission
    ], 200);
    }
    public function destroy(string $id)
    {
        ContactSubmission::find($id)->delete();
        return response()->json(['message' => 'Contact submission deleted'], 200);
    }
}
