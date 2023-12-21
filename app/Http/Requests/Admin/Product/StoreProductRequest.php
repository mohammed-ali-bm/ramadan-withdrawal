<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'store_p_id' => ['required', 'string', 'max:255'],
            'offers_ids' => ['required', 'array', 'exists:offers,id',],
            'expire_date' => ['required', 'date', 'after:today'],
            "price" => "required|numeric",
           

        ];
    }
}
