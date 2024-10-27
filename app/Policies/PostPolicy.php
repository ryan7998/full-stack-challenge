<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any posts.
     */
    public function viewAny(User $user): bool
    {
        return true; // All authenticated users can view jobs
    }

    /**
     * Determine whether the user can view the post.
     */
    public function view(User $user, Post $post): bool
    {
        return true; // All authenticated users can view a job
    }

    /**
     * Determine whether the user can create posts.
     */
    public function create(User $user): bool
    {
        // Only admins can create posts
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the post.
     */
    public function update(User $user, Post $post): bool
    {
        // Only admins can update posts
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the post.
     */
    public function delete(User $user, Post $post): bool
    {
        // Only admins can delete posts
        return $user->isAdmin();
    }
}
