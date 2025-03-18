<?php

namespace App\Repositories;

use App\Interfaces\TransferRepositoryInterface;
use App\Models\Transfer;

class TransferRepository implements TransferRepositoryInterface
{
    public function __construct(private Transfer $transfer)
    {
        $this->transfer = $transfer;
    }

    public function transfer(array $request = []): void
    {
        \DB::transaction(function () use ($request) {
            $this->transfer->create([
                'from_user_id' => $request['from_user_id'],
                'to_user_id' => $request['to_user_id'],
                'amount' => $request['amount'],
            ]);
        });
    }
}
