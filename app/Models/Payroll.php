<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    protected $fillable = ['employee_id', 'pay_period', 'amount', 'status'];

    public function employee () :BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

}
