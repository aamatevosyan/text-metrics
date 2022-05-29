<?php

namespace App\Policies;

use App\Models\Admin;
use Domain\Metrics\Models\TextMetricComputer;
use Illuminate\Auth\Access\HandlesAuthorization;

class TextMetricComputerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Admin  $user
     * @return bool
     */
    public function viewAny(Admin $user): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  Admin  $user
     * @param  TextMetricComputer  $model
     * @return bool
     */
    public function view(Admin $user, TextMetricComputer $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  Admin  $user
     * @return bool
     */
    public function create(Admin $user): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  Admin  $user
     * @param  TextMetricComputer  $model
     * @return bool
     */
    public function update(Admin $user, TextMetricComputer $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  Admin  $user
     * @param  TextMetricComputer  $model
     * @return bool
     */
    public function delete(Admin $user, TextMetricComputer $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin  $user
     * @param  TextMetricComputer  $model
     * @return bool
     */
    public function restore(Admin $user, TextMetricComputer $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin  $user
     * @param  TextMetricComputer  $model
     * @return bool
     */
    public function forceDelete(Admin $user, TextMetricComputer $model): bool
    {
        return false;
    }
}

