<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exams extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "points",
        "average",
        "access_code",
        "matter",
        "access_termination",
        "access",
        "remaining_points",
        "teacher_id"
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teachers::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Questions::class, 'exam_id');
    }
}
