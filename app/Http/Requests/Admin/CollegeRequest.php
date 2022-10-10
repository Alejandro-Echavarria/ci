<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $college = $this->route()->parameter('college');

        $rules = [
            'name'   => 'required|min:1|max:255|unique:colleges',
            'status' => ' required|in:1,2'
        ];

        if ($college) {
            
            $rules['name'] = 'required|min:1|max:255|unique:colleges,name,' . $college->id;
        }

        return $rules;
    }
}
