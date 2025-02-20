<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    protected $fillable = ['position_name', 'department_id'];

    public function department () :BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function employees () :HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
