<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
