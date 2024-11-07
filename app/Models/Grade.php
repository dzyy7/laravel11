<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    protected $with = ['students'];

    public function students():HasMany{
        return $this->hasMany(Student::class);
    }
    public function department():BelongsTo{
    {
        return $this->belongsTo(Department::class);
    }

}}
