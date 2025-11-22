<?php

namespace App\Http\Requests\Project;

use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class ImportStoreRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (!in_array($this->file->getClientOriginalExtension(), ['xlsx', 'xls'])) {
            throw \Illuminate\Validation\ValidationException::withMessages(
                ['не то разрешение файл']
            );
        }
        return [
            'file' => 'required|file'
        ];
    }
}
