<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Admin  $user
     * @return bool
     */
    public function viewAny(Admin $user)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  Admin  $user
     * @param  Admin  $admin
     * @return bool
     */
    public function view(Admin $user, Admin $admin)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  Admin  $user
     * @param  Admin  $admin
     * @return bool
     */
    public function update(Admin $user, Admin $admin)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  Admin  $user
     * @param  Admin  $admin
     * @return bool
     */
    public function delete(Admin $user, Admin $admin)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin  $user
     * @param  Admin  $admin
     * @return bool
     */
    public function restore(Admin $user, Admin $admin)
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin  $user
     * @param  Admin  $admin
     * @return bool
     */
    public function forceDelete(Admin $user, Admin $admin)
    {
        return false;
    }
}
