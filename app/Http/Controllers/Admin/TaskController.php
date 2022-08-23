<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\User;
use App\Models\Statuses;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')
                        ->where('created_by', auth()->user()->id)
                        ->latest()
                        ->paginate(5);

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::where('is_admin', false)->get();

        return view('admin.tasks.create', compact('users'));
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'user_id' => $request->user_id,
            'created_by' => auth()->user()->id,
            'name' => $request->name,
            'details' => $request->details,
            'status_id' => Statuses::where('name', 'Not yet started')->first()->id,
        ]);

        return redirect()->route('admin.tasks');
    }

    public function edit(Task $task)
    {
        $this->authorize('edit', $task);

        $users = User::where('is_admin', false)->get();

        return view('admin.tasks.edit', compact('task', 'users'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('edit', $task);

        $task->update($request->validated());

        return redirect()->route('admin.tasks');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('admin.tasks');
    }
}
