<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|max:150|unique:projects',
            'type_id' => 'nullable|exists:types,id',
            'description' => 'required',
            'repository_link' => 'required|max:255',
            'date_start' => 'required',
            'img' => 'max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The project name is required!',
            'name.max' => 'The project name must not be longer than 150 characters!',
            'name.unique' => 'The project name already exists!',
            'description.required' => 'The project description is required!',
            'repository_link.required' => 'The repository link is required!',
            'repository_link.max' => 'The repository link must not be longer than 255 characters!',
            'date_start.required' => 'The project starting date is required!',
            'img.max' => 'The image link must not be longer than 255 characters!'
        ];
    }
}
