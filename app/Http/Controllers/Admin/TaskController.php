<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user', 'status')
                        ->withoutGlobalScope('user')
                        ->totalAssignedTasks()
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
            'status_id' => Task::NOT_STARTED,
        ]);

        return redirect()->route('admin.tasks');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return view('admin.tasks.show', compact('task'));
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

    public function started()
    {
        $tasks = Task::withoutGlobalScope('user')
                    ->totalAssignedTasksStarted()
                    ->latest()
                    ->paginate(5);

        return view('admin.tasks.started', compact('tasks'));
    }

    public function notStarted()
    {
        $tasks = Task::withoutGlobalScope('user')
                    ->totalAssignedTasksNotStarted()
                    ->latest()
                    ->paginate(5);

        return view('admin.tasks.not-started', compact('tasks'));
    }

    public function completed()
    {
        $tasks = Task::withoutGlobalScope('user')
                    ->totalAssignedTasksCompleted()
                    ->latest()
                    ->paginate(5);

        return view('admin.tasks.completed', compact('tasks'));
    }
}
