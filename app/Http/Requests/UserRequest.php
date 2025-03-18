<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        match ($this->route()->getActionMethod()) {
            'update' => $rules = $this->update(),
            'deposit' => $rules = $this->deposit(),
        };

        return $rules;
    }

    public function update(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', "unique:users,email,{$this->id}"],
            'age' => ['integer', 'min:18'],
        ];
    }

    public function deposit(): array
    {
        return [
            'amount' => ['numeric', 'min:0.01'],
        ];
    }
}
