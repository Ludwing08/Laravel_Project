<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // "name" => "required|string|min:3|max:150|unique:categories,name",
            "name" => ["required", "string", "max:150", Rule::unique(table: 'categories', column: "name")->ignore(id: request('category'), idColumn: 'id')],
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => __("This category already exists!")            
        ];
    }
}
