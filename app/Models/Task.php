<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isOwnedBy()
    {
        return $this->user_id == auth()->user()->id;
    }
}
