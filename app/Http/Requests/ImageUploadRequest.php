<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required|date',
            'phone_number' => 'required|digits:10|unique:profiles',
            'school_name' => 'required',
            'your_photo' => 'required|image',
            'citizenship_photo' => 'required|image',
            'marksheet_photo' => 'required|image',
            'interest' => 'required|accepted',
        ];
    }

    public function messages()
{
    return [
        'gender.required' => 'Gender hala na',
        'interest.required' => 'You must select at least one of your interest.',
    ];
}
}
