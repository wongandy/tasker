<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    CONST NOT_STARTED = 1;
    CONST STARTED = 2;
    CONST COMPLETED = 3;

    protected $fillable = [
        'user_id',
        'created_by',
        'name',
        'details',
        'status_id',
    ];

    protected static function booted()
    {
        if (auth()->check() && ! auth()->user()->is_admin) {
            static::addGlobalScope('user', function (Builder $builder) {
                $builder->where('user_id', auth()->user()->id);
            });
        }
    }

    public function scopeStarted($query)
    {
        return $query->where('status_id', Task::STARTED);
    }

    public function scopeNotStarted($query)
    {
        return $query->where('status_id', Task::NOT_STARTED);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status_id', Task::COMPLETED);
    }

    public function scopeTotalAssignedTasks($query)
    {
        return $query->where('created_by', auth()->user()->id);
    }

    public function scopeTotalAssignedTasksStarted($query)
    {
        return $query->where('created_by', auth()->user()->id)
            ->where('status_id', Task::STARTED);
    }

    public function scopetotalAssignedTasksNotStarted($query)
    {
        return $query->where('created_by', auth()->user()->id)
            ->where('status_id', Task::NOT_STARTED);
    }

    public function scopeTotalAssignedTasksCompleted($query)
    {
        return $query->where('created_by', auth()->user()->id)
            ->where('status_id', Task::COMPLETED);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function isOwnedBy()
    {
        return $this->user_id == auth()->user()->id;
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }
}
