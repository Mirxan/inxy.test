<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Interfaces\UserRepositoryInterface;

class BalanceCheck implements ValidationRule
{
        /**
     * Create a new rule instance.
     *
     */
    public function __construct(
        public string $compare_user_id,
    )
    {
        $this->compare_user_id = $compare_user_id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user_id = request()->get($this->compare_user_id);

        $user = app(UserRepositoryInterface::class)->getUserById($user_id);

        if ($user?->balance < $value) {
            $fail('Insufficient funds');
        }
    }
}
