<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $data = Task::latest()->get();
        return response()->json([TaskResource::collection($data), 'Program Fecthed']);
    }


    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'questionId' => $request->questionId,
        ]);
        if ($task) {
            return response()->json(['User Berhasil ditambah', new TaskResource($task)]);
        } else {
            return response()->json(['Gagal', new TaskResource($task)]);
        }
    }


    public function show($id)
    {
        $task = Task::find($id);
        if (is_null($task)) {
            return response()->json('Data Not Found', 404);
        }
        return response()->json([new TaskResource($task)]);
    }


    public function update(Request $request,  $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json(['Update Success', $task]);
    }


    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $task->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
