<?php

namespace App\Policies;

use App\Models\User;

class BookPolicy
{
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    public function update(User $user)
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function viewAny(User $user)
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function view(User $user)
    {
        return $user->hasAnyRole(['admin', 'staff']);
    }

    public function delete(User $user)
    {
        return $user->hasRole('admin');
    }
}
