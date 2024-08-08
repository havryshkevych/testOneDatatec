<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSubmission;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    public function submit(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        ProcessSubmission::dispatch($request->only('name', 'email', 'message'));

        return response()->json(['message' => 'Submission is being processed.'], 200);
    }
}
