<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Support;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the support can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the support can view the model.
     */
    public function view(User $user, Support $model): bool
    {
        return true;
    }

    /**
     * Determine whether the support can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the support can update the model.
     */
    public function update(User $user, Support $model): bool
    {
        return true;
    }

    /**
     * Determine whether the support can delete the model.
     */
    public function delete(User $user, Support $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the support can restore the model.
     */
    public function restore(User $user, Support $model): bool
    {
        return false;
    }

    /**
     * Determine whether the support can permanently delete the model.
     */
    public function forceDelete(User $user, Support $model): bool
    {
        return false;
    }
}
