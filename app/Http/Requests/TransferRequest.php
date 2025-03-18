<?php

namespace App\Http\Requests;

use App\Rules\BalanceCheck;
use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
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
            'transfer' => $rules = $this->transfer(),
        };

        return $rules;
    }

    public function transfer(): array
    {
        return [
            'from_user_id' => ['required', 'exists:users,id'],
            'to_user_id' => ['required', 'exists:users,id', 'different:from_user_id'],
            'amount' => ['required', 'numeric', 'min:0.01', new BalanceCheck('from_user_id')],
        ];
    }
}
