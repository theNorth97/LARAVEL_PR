<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
            'service_name' => 'required',
            'phone' => 'required|regex:/^[\d\+\-\(\)\s]+$/|min:6|max:20',
            'description' => 'required | min:8 ',
        ];
    }

    public function messages()
    {
        return [
            'service_name.required' => 'Выберите услугу',
            'phone.required' => 'Введите телефон',
            'description.required' => 'Заполните описание',
        ];
    }
}
