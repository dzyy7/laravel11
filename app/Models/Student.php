<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    // protected $with = ['Grade'];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
