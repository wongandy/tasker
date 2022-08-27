<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasksStarted = Task::started()->count();
        $totalTasksNotStarted = Task::notStarted()->count();
        $totalTasksCompleted = Task::completed()->count();

        return view('user.index', compact('totalTasksStarted', 'totalTasksNotStarted', 'totalTasksCompleted'));
    }
}
