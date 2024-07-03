<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\User;

class HotelPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function createTransaction(User $user)
    {
        return ($user->role == 'pembeli'
            ? Response::allow()
            : Response::deny('Owner and Staff cannot book hotel'));
    }

    public function editDeleteTransaction(User $user)
    {
        return ($user->role == 'owner'
            ? Response::allow()
            : Response::deny('You must be an Administrator'));
    }

    public function menu(User $user)
    {
        return ($user->role == 'owner' || $user->role == 'staff'
            ? Response::allow()
            : Response::deny('You must be an administrator or staff'));
    }

    public function create(User $user)
    {
        return ($user->role == 'owner' || $user->role == 'staff'
            ? Response::allow()
            : Response::deny('You must be an administrator or staff'));
    }

    public function edit(User $user)
    {
        return ($user->role == 'owner' || $user->role == 'staff'
            ? Response::allow()
            : Response::deny('You must be an administrator or staff'));
    }

    public function delete(User $user)
    {
        return ($user->role == 'owner'
            ? Response::allow()
            : Response::deny('You must be an administrator'));
    }
}
