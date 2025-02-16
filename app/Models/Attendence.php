<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $fillable = ['employee_id', 'date', 'checked_in', 'checked_out', 'status'];

    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
