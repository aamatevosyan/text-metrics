<?php

namespace App\Policies;

use App\Models\Admin;
use Domain\Metrics\Models\TextMetric;
use Illuminate\Auth\Access\HandlesAuthorization;

class TextMetricPolicy
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
     * @param  TextMetric  $model
     * @return bool
     */
    public function view(Admin $user, TextMetric $model): bool
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
     * @param  TextMetric  $model
     * @return bool
     */
    public function update(Admin $user, TextMetric $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  Admin  $user
     * @param  TextMetric  $model
     * @return bool
     */
    public function delete(Admin $user, TextMetric $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin  $user
     * @param  TextMetric  $model
     * @return bool
     */
    public function restore(Admin $user, TextMetric $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin  $user
     * @param  TextMetric  $model
     * @return bool
     */
    public function forceDelete(Admin $user, TextMetric $model): bool
    {
        return false;
    }
}

