<?php

namespace App\Interfaces;

interface TransferRepositoryInterface
{
    public function transfer(array $request = []): void;
}
