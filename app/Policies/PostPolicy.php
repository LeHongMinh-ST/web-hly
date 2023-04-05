<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function create (): bool
    {
        return true;
    }

    public function edit (User $user, Post $post): bool
    {
        return $user->id == $post->create_by || $user->is_super_admin;
    }

    public function update (User $user, Post $post): bool
    {
        return $user->id == $post->create_by || $user->is_super_admin;
    }

    public function delete (User $user, Post $post): bool
    {
        return $user->id == $post->create_by || $user->is_super_admin;
    }
}
