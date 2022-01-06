<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @mixin IdeHelperAdmin
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $profile_photo_url
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereProfilePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class IdeHelperAdmin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @mixin IdeHelperBranch
 * @property int $id
 * @property int|null $parent_id
 * @property int $_lft
 * @property int $_rgt
 * @property int $branch_type_id
 * @property array $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|Branch[] $children
 * @property-read int|null $children_count
 * @property-read array $translations
 * @property-read Branch|null $parent
 * @property-read \App\Models\BranchType|null $type
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch fixSubtree($root)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch fixTree($root = null)
 * @method static \Kalnoy\Nestedset\Collection|static[] get($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch getNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch getPlainNodeData($id, $required = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch getTotalErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch hasChildren()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch hasParent()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch isBroken()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch leaves(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch makeGap(int $cut, int $height)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch moveNode($key, $position)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch newModelQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch newQuery()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch orWhereDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch orWhereNodeBetween($values)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch orWhereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch query()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch rebuildSubtree($root, array $data, $delete = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch rebuildTree(array $data, $delete = false, $root = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch reversed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch root(array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereAncestorOrSelf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereBranchTypeId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereCreatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereLft($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereName($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereParentId($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereRgt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereUpdatedAt($value)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch withoutRoot()
 */
	class IdeHelperBranch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\BranchType
 *
 * @mixin IdeHelperBranchType
 * @property int $id
 * @property array $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Branch[] $branches
 * @property-read int|null $branches_count
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType whereUpdatedAt($value)
 */
	class IdeHelperBranchType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @mixin IdeHelperUser
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $profile_photo_url
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser extends \Eloquent {}
}

