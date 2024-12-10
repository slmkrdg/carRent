<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VehicleAssignmentShowRequest;
use App\Http\Requests\UserVehicleAssignmentsRequest;
use App\Http\Requests\VehicleAssignmentStoreRequest;
use App\Http\Requests\VehicleAssignmentUpdateRequest;
use App\Http\Requests\VehicleAssignmentDestroyRequest;



class VehicleAssignmentController extends Controller
{
    // 1. Zimmet Listeleme
    public function index(UserVehicleAssignmentsRequest $request)
    {
        return generateResponse(0,0,200,"İşlem başarılı",['vehicles' => Auth::user()->vehicles]);
    }

    // 2. Zimmet Ekleme
    public function store(VehicleAssignmentStoreRequest $request)
    {
        $vehicle = Vehicle::find($request->vehicle_id);
        $vehicle->employees()->attach(auth()->id(), ['created_at' => now()]);
        return generateResponse(0,0,200,"İşlem başarılı",['vehicle' => $vehicle]);
    }

    // 3. Zimmet Güncelleme
    public function update(VehicleAssignmentUpdateRequest $request)
    {
        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $vehicle->employees()->sync([auth()->id() => ['updated_at' => now()]]);
        return generateResponse(0,0,200,"İşlem başarılı",['vehicle' => $vehicle]);
    }

    // 4. Zimmet Silme
    public function destroy(VehicleAssignmentDestroyRequest $request)
    {
        $vehicle = Vehicle::findOrFail($request->vehicle_id);
        $vehicle->employees()->detach(auth()->id());
        return generateResponse(0,0,200,"İşlem başarılı");
    }

    // 5. Zimmet Detaylarını Görme
    public function show(VehicleAssignmentShowRequest $request)
    {
        return generateResponse(0,0,200,"İşlem başarılı",['vehicle' => Vehicle::with('employees')->findOrFail($request->vehicle_id)]);
    }
}
