<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAssignedTasks = Task::where('created_by', auth()->user()->id)->count();
        $totalAssignedTasksStarted = Task::where('created_by', auth()->user()->id)->where('status_id', Task::STARTED)->count();
        $totalAssignedTasksNotYetStarted = Task::where('created_by', auth()->user()->id)->where('status_id', Task::NOT_STARTED)->count();
        $totalAssignedTasksCompleted = Task::where('created_by', auth()->user()->id)->where('status_id', Task::COMPLETED)->count();

        return view('admin.index', compact('totalAssignedTasks', 'totalAssignedTasksStarted', 'totalAssignedTasksNotYetStarted', 'totalAssignedTasksCompleted'));
    }
}
