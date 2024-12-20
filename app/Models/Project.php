<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['student_id', 'title','start_date','End_date','status','files','Member_id'];
    public function student()
    {
        return $this->belongsTo(student::class);
    }  
    public function Member()
    {
        return $this->belongsTo(Member::class);
    }  
}
