<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'performance' => 'nullable|text|min:10',
            'cv' => 'nullable|image|max:1024',
            'picture' => 'nullable|image|max:1024',
            'phone' =>  'nullable|string|max:20',
            'credit_card' => 'nullable|string|max:16',
            'user_id' => 'exists:user,id',
            'specialization_id' => 'exists:specializations,id|array|required'
        ];
    }
}
