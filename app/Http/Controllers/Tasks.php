<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskListResource;
use App\Http\Resources\TaskCompletedResource;

class Tasks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskListResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'notes', 'completed', 'due_date']);
        $task = Task::create($data);
        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_all(Request $request, Task $task)
    {
        $data = $request->only(['title', 'notes', 'completed', 'due_date']);
        $task->fill($data)->save();
        return new TaskResource($task);
    }

    public function update_completed(Request $request, Task $task)
    {
        $data = $request->only(['completed']);
        $task->fill($data)->save();
        return new TaskCompletedResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response(null, 204);
    }
}
