<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExporterUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'max:255', 'string'],
            'last_name' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'nationality' => ['required', 'max:255', 'string'],
            'gender' => ['required', 'in:male,female,other'],
            'license' => ['required', 'max:255', 'string'],
            'commercial_book' => ['required', 'max:255', 'string'],
            'commercial_room' => ['required', 'max:255', 'string'],
            'block_time' => ['required', 'max:255', 'string'],
            'block_reason' => ['required', 'max:255', 'string'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }
}
