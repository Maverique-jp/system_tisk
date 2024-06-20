<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConnectRequest extends FormRequest
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
        'product_name' =>['required','string','max:20'],
        'category' =>['required'],
        'price' =>['required'],
        'stock' =>['required'],
        'comment' =>['required','string','max:200'],
        ];
    }
}
