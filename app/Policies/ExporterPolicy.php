<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Exporter;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExporterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the exporter can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the exporter can view the model.
     */
    public function view(User $user, Exporter $model): bool
    {
        return true;
    }

    /**
     * Determine whether the exporter can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the exporter can update the model.
     */
    public function update(User $user, Exporter $model): bool
    {
        return true;
    }

    /**
     * Determine whether the exporter can delete the model.
     */
    public function delete(User $user, Exporter $model): bool
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
     * Determine whether the exporter can restore the model.
     */
    public function restore(User $user, Exporter $model): bool
    {
        return false;
    }

    /**
     * Determine whether the exporter can permanently delete the model.
     */
    public function forceDelete(User $user, Exporter $model): bool
    {
        return false;
    }
}
