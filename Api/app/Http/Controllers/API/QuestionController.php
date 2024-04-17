<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $data = Question::latest()->get();
        return response()->json([QuestionResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $question = Question::create([
            'question' => $request->question,
            'isDone' => $request->isDone,
            'description' => $request->description
        ]);
        if ($question) {
            return response()->json(['User Berhasil ditambah', new QuestionResource($question)]);
        } else {
            return response()->json(['Gagal', new QuestionResource($question)]);
        }
    }


    public function show($id)
    {
        $question = Question::find($id);
        if (is_null($question)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new QuestionResource($question)]);
    }


    public function update(Request $request,  $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());
        return response()->json(['Update Success', $question]);
    }


    public function destroy($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $question->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
