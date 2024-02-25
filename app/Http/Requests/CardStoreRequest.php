<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardStoreRequest extends FormRequest
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
            'status' => ['required', 'max:255', 'string'],
            'issued_at' => ['required', 'date'],
            'expires_at' => ['required', 'date'],
            'exporter_id' => ['required', 'exists:exporters,id'],
        ];
    }
}
