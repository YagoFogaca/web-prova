<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        "teacher_id",
    ];

    public function teachers(): BelongsTo
    {
        return $this->belongsTo(Teachers::class);
    }
}
