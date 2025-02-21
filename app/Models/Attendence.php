<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'date', 'checked_in', 'checked_out', 'status'];

    public function employee ()
    {
        return $this->belongsTo(Employee::class);
    }
}
