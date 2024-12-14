<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;
    protected $fillable=['student_id', 'title','doi','year','type'];
    public function student()
    {
        return $this->belongsTo(student::class);
    }  
}