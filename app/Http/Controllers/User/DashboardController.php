<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasksStarted = Task::where('user_id', auth()->user()->id)->where('status_id', Task::STARTED)->count();
        $totalTasksNotStarted = Task::where('user_id', auth()->user()->id)->where('status_id', Task::NOT_STARTED)->count();
        $totalTasksCompleted = Task::where('user_id', auth()->user()->id)->where('status_id', Task::COMPLETED)->count();

        return view('user.index', compact('totalTasksStarted', 'totalTasksNotStarted', 'totalTasksCompleted'));
    }
}
