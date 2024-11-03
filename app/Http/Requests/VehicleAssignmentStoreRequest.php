<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleAssignmentStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check(); // Kullanıcı doğrulaması yapılmalı
    }

    public function rules()
    {
        return [
            'vehicle_id' => 'required|exists:vehicles,id' // Zimmetlenecek araç
        ];
    }
}
