<?php
declare(strict_types=1);

namespace App\Services;

use App\Model\User;

class UserService
{

    public function user($id): ?array
    {
        $user = User::query()->where('id', $id)->first();

        if ($user) {
            return $user->toArray();
        }

        return null;
    }

    public function findByName(string $name) :?array
    {
        $user = User::query()->where('name', $name)->first();
        if($user) {
            return $user->toArray();
        }
        return null;
    }
}