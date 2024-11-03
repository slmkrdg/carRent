<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand', 
        'model',
        'year',
        'color',
        'plate_number',     
    ];

    public function employees()
    {
        return $this->belongsToMany(User::class, 'employee_vehicle')
                    ->withTimestamps();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'employee_vehicle', 'vehicle_id', 'user_id');
    }
}
