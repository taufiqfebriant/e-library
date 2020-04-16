<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|unique:App\Book,title,' . ($this->book->id ?? ''),
            'synopsis' => 'required',
            'cover' => 'nullable|file|image',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'pages' => 'required|numeric',
            'preview' => 'nullable|file|mimes:pdf'
        ];
    }
}
