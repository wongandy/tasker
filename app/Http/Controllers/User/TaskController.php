<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use App\Models\User;
use App\Models\Statuses;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('status')
                    ->where('user_id', auth()->user()->id)
                    ->orderByDesc('id')
                    ->paginate(5);

        return view('user.tasks.index', compact('tasks'));
    }

    public function edit(Task $task)
    {
        $users = User::where('is_admin', false)->get();
        $status = Statuses::get();

        return view('user.tasks.edit', compact('task', 'users', 'status'));
    }

    public function update(UpdateUserTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('user.tasks');
    }

    public function started()
    {
        $tasks = Task::with('user', 'status')
                    ->where('user_id', auth()->user()->id)
                    ->where('status_id', Task::STARTED)
                    ->latest()
                    ->paginate(5);

        return view('user.tasks.started', compact('tasks'));
    }

    public function notStarted()
    {
        $tasks = Task::with('user', 'status')
                    ->where('user_id', auth()->user()->id)
                    ->where('status_id', Task::NOT_STARTED)
                    ->latest()
                    ->paginate(5);

        return view('user.tasks.not-started', compact('tasks'));
    }

    public function completed()
    {
        $tasks = Task::with('user', 'status')
                    ->where('user_id', auth()->user()->id)
                    ->where('status_id', Task::COMPLETED)
                    ->latest()
                    ->paginate(5);

        return view('user.tasks.completed', compact('tasks'));
    }
}
