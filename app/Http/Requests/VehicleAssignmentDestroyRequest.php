<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleAssignmentDestroyRequest extends FormRequest
{

    function validationData() { 
        return $this->route()->parameters(); 
    }
    
    public function authorize()
    {
        return auth()->check(); // Kullanıcı doğrulaması yapılmalı
    }

    public function rules()
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id', // Silinecek araç zimmeti
        ];
    }
}
