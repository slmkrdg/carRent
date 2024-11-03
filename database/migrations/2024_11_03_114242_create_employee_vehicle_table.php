<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeVehicleTable extends Migration
{
    public function up()
    {
        Schema::create('employee_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_id', 'vehicle_id']); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_vehicle');
    }
}
