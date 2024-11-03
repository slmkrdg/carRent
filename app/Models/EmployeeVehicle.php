<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeVehicle extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'vehicle_id'];

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
