<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'create-title' => ['required', 'string', 'max:255'],
            'create-description' => ['nullable', 'string'],
            'create-stage' => ['required', 'string', 'in:planned,ongoing,completed'],
            'create-priority' => ['required', 'string', 'in:low,medium,high'],
            'create-deadline' => ['nullable', 'date'], // after_or_equal:today
            'create-assigned[]' => ['nullable', 'array'],
            'create-assigned.*' => ['exists:users,id', 'distinct'],
            'kanban_code' => ['required', 'string', 'exists:kanbans,code', 'regex:/^[A-Z0-9]{4}-[A-Z0-9]{4}$/i'],
        ];
    }
}
