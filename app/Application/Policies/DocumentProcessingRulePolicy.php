<?php

namespace App\Policies;

use App\Models\Admin;
use Domain\DocumentProcessing\Models\DocumentProcessingRule;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentProcessingRulePolicy
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
     * @param  DocumentProcessingRule  $model
     * @return bool
     */
    public function view(Admin $user, DocumentProcessingRule $model): bool
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
     * @param  DocumentProcessingRule  $model
     * @return bool
     */
    public function update(Admin $user, DocumentProcessingRule $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  Admin  $user
     * @param  DocumentProcessingRule  $model
     * @return bool
     */
    public function delete(Admin $user, DocumentProcessingRule $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin  $user
     * @param  DocumentProcessingRule  $model
     * @return bool
     */
    public function restore(Admin $user, DocumentProcessingRule $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin  $user
     * @param  DocumentProcessingRule  $model
     * @return bool
     */
    public function forceDelete(Admin $user, DocumentProcessingRule $model): bool
    {
        return false;
    }
}

