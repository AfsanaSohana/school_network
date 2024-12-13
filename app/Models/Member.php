<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable=['student_id', 'project_id'];
    public function student()
    {
        return $this->belongsTo(student::class);
    }  
    public function project()
    {
        return $this->belongsTo(project::class);
    }  
}