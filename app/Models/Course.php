<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Professor;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course', 'description'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function professor()
    {
        return $this->hasOne(Professor::class);
    }
}
