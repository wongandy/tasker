<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function edit(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

    public function view(User $user, Task $task)
    {
        return $user->id === $task->createdBy->id;
    }
}
