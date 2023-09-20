<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alternatives extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternative',
        'correct_alternative',
        'question_id'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Questions::class);
    }
}
