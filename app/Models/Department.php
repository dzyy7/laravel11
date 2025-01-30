<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',         // Nama departemen
        'desc',         // Deskripsi departemen
    ];

    protected $table = 'departments';
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
