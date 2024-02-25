<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupportStoreRequest extends FormRequest
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
            'description' => ['required', 'max:255', 'string'],
            'support_type_id' => ['required', 'exists:support_types,id'],
            'exporter_id' => ['required', 'exists:exporters,id'],
        ];
    }
}
