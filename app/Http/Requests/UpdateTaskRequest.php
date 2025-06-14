<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'edit-title' => ['required', 'string', 'max:255'],
            'edit-description' => ['nullable', 'string'],
            'edit-stage' => ['required', 'string', 'in:planned,ongoing,completed'],
            'edit-priority' => ['required', 'string', 'in:low,medium,high'],
            'edit-deadline' => ['nullable', 'date'], // after_or_equal:today
            'edit-assigned[]' => ['nullable', 'array'],
            'edit-assigned.*' => ['exists:users,id', 'distinct'],
            'task_id' => ['required', 'integer', 'exists:tasks,id'],
            'kanban_code' => ['required', 'string', 'exists:kanbans,code', 'regex:/^[A-Z0-9]{4}-[A-Z0-9]{4}$/i'],
        ];
    }
}
