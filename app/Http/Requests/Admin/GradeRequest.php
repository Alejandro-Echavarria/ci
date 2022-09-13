<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $grade = $this->route()->parameter('grade');

        $rules = [
            'name'   => 'required|min:1|max:1|unique:grades',
            'value'  => 'required|numeric|between:0,4',
            'status' => ' required|in:1,2'
        ];

        if ($grade) {
            
            $rules['name'] = 'required|min:1|max:1|unique:grades,name,' . $grade->id;
        }

        return $rules;
    }
}
