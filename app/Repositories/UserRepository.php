<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private User $user)
    {
        $this->user = $user;
    }

    public function getUserById(int $id, bool $lock = true): User
    {
        return $this->user->when($lock, fn($q)=> $q->lockForUpdate())->findOrFail($id);
    }

    public function updateUser(array $request, int $id): ?User
    {
        return tap($this->getUserById($id, lock: false),function($user) use($request){
            $user->update($request);
        });
    }

    public function deposit(int $id, float $amount): ?User
    {
        return \DB::transaction(function () use ($id, $amount) {
            return tap($this->getUserById($id, false),function($user) use($id, $amount){
                $user->increment('balance', $amount);
            });
        });
    }
}
