<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = ['department_name', 'department_id'];
            
    public function positions () :HasMany
    {
        return $this->hasMany(Position::class);
    }
    public function employees () :HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
