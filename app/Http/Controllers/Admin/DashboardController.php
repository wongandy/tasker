<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAssignedTasks = Task::withoutGlobalScope('user')->totalAssignedTasks()->count();
        $totalAssignedTasksStarted = Task::withoutGlobalScope('user')->totalAssignedTasksStarted()->count();
        $totalAssignedTasksNotStarted = Task::withoutGlobalScope('user')->totalAssignedTasksNotStarted()->count();
        $totalAssignedTasksCompleted = Task::withoutGlobalScope('user')->totalAssignedTasksCompleted()->count();

        return view('admin.index', compact('totalAssignedTasks', 'totalAssignedTasksStarted', 'totalAssignedTasksNotStarted', 'totalAssignedTasksCompleted'));
    }
}
