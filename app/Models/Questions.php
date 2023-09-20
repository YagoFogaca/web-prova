<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'statement',
        'points',
        'correct_alternative',
        'exam_id'
    ];

    public function alternatives(): HasMany
    {
        return $this->hasMany(Alternatives::class, 'question_id');
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exams::class);
    }
}
