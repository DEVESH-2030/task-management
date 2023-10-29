<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','priority','project_id', 'order'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
