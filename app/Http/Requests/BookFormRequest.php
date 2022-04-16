<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title'             => "required|max:255",
            'authors'           => "required|max:255",
            'released_at'       => "required|before:now|date",
            'pages'             => "required|min:1|numeric",
            'isbn'              => "required|regex:/^(?=(?:\D*\d){10}(?:(?:\D*\d){3})?$)[\d-]+$/i",
            'description'       => "",
            'genres[]'            => "array|numeric",
            'in_stock'          => "required|min:0|numeric",

        ];
    }




}
