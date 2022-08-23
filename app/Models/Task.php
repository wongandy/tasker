<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_by',
        'name',
        'details',
        'status_id',
    ];

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
