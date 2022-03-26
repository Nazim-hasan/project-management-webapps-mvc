<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function assignedTasks(){
        return Task::where('projectId', $this->id)->get();
    }
}
