<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
//    public function viewAny(User $user): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can view the model.
     */
//    public function view(User $user, Blog $blog): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can create models.
     */
//    public function create(User $user): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blog $blog): bool
    {
        // Authorize the update action only for the blog’s owner
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blog $blog): bool
    {
        // Authorize the delete action only for the blog’s owner
        return $user->id === $blog->user_id;
    }
    
    /**
     * Determine whether the user can toggle
     */
    public function toggle(User $user, Blog $blog): bool
    {
        // Only admins can toggle the blog's active status
        return $user->role === 'admin';
    }
    /**
     * Determine whether the user can restore the model.
     */
//    public function restore(User $user, Blog $blog): bool
//    {
//        //
//    }

    /**
     * Determine whether the user can permanently delete the model.
     */
//    public function forceDelete(User $user, Blog $blog): bool
//    {
//        //
//    }
}
