<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = ['employee_id', 'date', 'time', 'status'];

    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
