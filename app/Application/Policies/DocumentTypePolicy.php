<?php

namespace App\Policies;

use App\Models\Admin;
use Domain\DocumentProcessing\Models\DocumentType;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentTypePolicy
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
     * @param  DocumentType  $model
     * @return bool
     */
    public function view(Admin $user, DocumentType $model): bool
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
     * @param  DocumentType  $model
     * @return bool
     */
    public function update(Admin $user, DocumentType $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  Admin  $user
     * @param  DocumentType  $model
     * @return bool
     */
    public function delete(Admin $user, DocumentType $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  Admin  $user
     * @param  DocumentType  $model
     * @return bool
     */
    public function restore(Admin $user, DocumentType $model): bool
    {
        return $user->isAn('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  Admin  $user
     * @param  DocumentType  $model
     * @return bool
     */
    public function forceDelete(Admin $user, DocumentType $model): bool
    {
        return false;
    }
}

