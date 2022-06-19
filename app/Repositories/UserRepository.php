<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUsers()
    {
        return $this->user->get();
    }
}
