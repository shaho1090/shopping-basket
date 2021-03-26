<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:150',
            'brand' => 'string|max:150',
            'image' => 'bail|mimes:jpg,bmp,png|max:1024',
            'inventory' => 'bail|nullable|sometimes|numeric'
        ];
    }
}
