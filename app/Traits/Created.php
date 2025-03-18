<?php

namespace App\Traits;
use App\Interfaces\UserRepositoryInterface;

trait Created
{


    protected static function bootCreatedBy(): void
    {
        $user = app(UserRepositoryInterface::class);

        static::creating(function ($model) use ($user){
            $fromUser = $user->getUserById($model->from_user_id);
            $toUser = $user->getUserById($model->to_user_id);
    
            $fromUser->decrement('balance', $model->amount);
            $toUser->increment('balance', $model->amount);
        });
    }
}
