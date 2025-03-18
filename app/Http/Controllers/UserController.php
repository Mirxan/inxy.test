<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct(private UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function update(UserRequest $request, int $id)
    {
        $user = $this->userInterface->updateUser($request->validated(), $id);

        return response()->successResponse(['message' => 'User updated successfully', 'data' => $user]);
    }

    public function deposit(UserRequest $request, int $id)
    {
        $user = $this->userInterface->deposit($id, $request->validated('amount'));

        return response()->json(['message' => 'Deposit successful', 'balance' => $user->balance]);
    }
}

