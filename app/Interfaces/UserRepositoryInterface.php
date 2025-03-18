<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getUserById(int $id): User;

    public function updateUser(array $request, int $id): ?User;

    public function deposit(int $id, float $amount): ?User;
}
