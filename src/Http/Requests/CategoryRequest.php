<?php

namespace Fraidoon\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.max' => 'Max 255 A title is required',
        ];
    }
}
