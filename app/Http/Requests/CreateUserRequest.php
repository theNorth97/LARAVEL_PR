<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateUserRequest extends FormRequest
{
    public array $rights = [];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $this->rights['can_create_aplication1111'] = true;
        return true; // с бд тяну права. 
        // научиться все права юзера 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
