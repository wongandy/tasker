<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAssignedTasks = Task::totalAssignedTasks()->count();
        $totalAssignedTasksStarted = Task::totalAssignedTasksStarted()->count();
        $totalAssignedTasksNotStarted = Task::totalAssignedTasksNotStarted()->count();
        $totalAssignedTasksCompleted = Task::totalAssignedTasksCompleted()->count();

        return view('admin.index', compact('totalAssignedTasks', 'totalAssignedTasksStarted', 'totalAssignedTasksNotStarted', 'totalAssignedTasksCompleted'));
    }
}
