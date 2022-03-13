<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function assignedTask(){
        return Project::where('ProjectId', $this->ProjectId)->first();
    }
}
