<?php

namespace App\Http\Controllers;

use App\Interfaces\TransferRepositoryInterface;
use App\Http\Requests\TransferRequest;

class TransferController extends Controller
{
    public function __construct(private TransferRepositoryInterface $transferinterface)
    {
        $this->transferinterface = $transferinterface;
    }

    public function transfer(TransferRequest $request): array
    {
        $this->transferinterface->transfer($request->validated());

        return response()->successResponse(['message' => 'Transfer successful']);
    }
}
