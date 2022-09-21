<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuaterRequest extends FormRequest
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
        $quater = $this->route()->parameter('grade');

        $rules = [
            'name'   => 'required|min:1|max:60',
            // 'slug'  => 'required|min:1|max:60|unique:quaters',
            // 'subjects[0]' => 'required|exists:grades,id'
        ];

        if ($quater) {
            
            $rules['slug'] = 'required|min:1|max:60|unique:quaters,slug,' . $quater->id;
        }

        return $rules;
    }
}
