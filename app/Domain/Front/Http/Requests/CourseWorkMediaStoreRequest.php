<?php

namespace Domain\Front\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseWorkMediaStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'uploaded_file' => 'required|file|mimes:pdf',
        ];
    }
}
