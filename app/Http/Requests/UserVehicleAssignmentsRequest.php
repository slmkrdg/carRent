<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserVehicleAssignmentsRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check(); // Kullanıcı doğrulaması yapılmalı
    }

    public function rules()
    {
        return [];
    }
}
