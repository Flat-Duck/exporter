<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SupportType;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupportTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the supportType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the supportType can view the model.
     */
    public function view(User $user, SupportType $model): bool
    {
        return true;
    }

    /**
     * Determine whether the supportType can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the supportType can update the model.
     */
    public function update(User $user, SupportType $model): bool
    {
        return true;
    }

    /**
     * Determine whether the supportType can delete the model.
     */
    public function delete(User $user, SupportType $model): bool
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
     * Determine whether the supportType can restore the model.
     */
    public function restore(User $user, SupportType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the supportType can permanently delete the model.
     */
    public function forceDelete(User $user, SupportType $model): bool
    {
        return false;
    }
}
