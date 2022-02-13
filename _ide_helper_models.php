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
 * @property int $id
 * @property int|null $branch_id
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \App\Models\Branch|null $branch
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsNot($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereProfilePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
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
	class IdeHelperBranch {}
}

namespace App\Models{
/**
 * App\Models\BranchType
 *
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
	class IdeHelperBranchType {}
}

namespace App\Models{
/**
 * App\Models\CourseWork
 *
 * @property int $id
 * @property string $uuid
 * @property int $student_id
 * @property int $supervisor_id
 * @property \App\Enums\CourseWorkType $type
 * @property \App\Enums\CourseWorkStatus $status
 * @property array $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Supervisor $supervisor
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereSupervisorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork withUuids(array $uuids)
 */
	class IdeHelperCourseWork {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int $media_id
 * @property string $uuid
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Media $media
 * @property-read Section|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Section withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|Section withUuids(array $uuids)
 */
	class IdeHelperSection {}
}

namespace App\Models{
/**
 * App\Models\SectionBlock
 *
 * @property int $id
 * @property string $uuid
 * @property int $section_id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Section $section
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock withUuids(array $uuids)
 */
	class IdeHelperSectionBlock {}
}

namespace App\Models{
/**
 * App\Models\Student
 *
 * @property int $id
 * @property int $branch_id
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \App\Models\Branch|null $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseWork[] $courseWorks
 * @property-read int|null $course_works_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIsNot($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereProfilePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 */
	class IdeHelperStudent {}
}

namespace App\Models{
/**
 * App\Models\Supervisor
 *
 * @property int $id
 * @property int $branch_id
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \App\Models\Branch|null $branch
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIsNot($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereProfilePhotoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereUpdatedAt($value)
 */
	class IdeHelperSupervisor {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessingRule
 *
 * @property int $id
 * @property string $uuid
 * @property \App\Enums\CourseWorkType|null $course_work_type
 * @property int|null $branch_id
 * @property int $document_processor_id
 * @property \App\Enums\DocumentProcessingRuleStatus $status
 * @property array|null $config
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Domain\DocumentProcessing\Models\DocumentProcessor|null $processor
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereCourseWorkType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereDocumentProcessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule withUuids(array $uuids)
 */
	class IdeHelperDocumentProcessingRule {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessor
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $class
 * @property \App\Enums\DocumentProcessorStatus $status
 * @property array|null $config
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor withUuids(array $uuids)
 */
	class IdeHelperDocumentProcessor {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessorDocumentType
 *
 * @property int $id
 * @property int $document_processor_id
 * @property int $document_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType whereDocumentProcessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType whereDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType whereUpdatedAt($value)
 */
	class IdeHelperDocumentProcessorDocumentType {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentType
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property array $mime_types
 * @property \App\Enums\DocumentTypeStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Domain\DocumentProcessing\Models\DocumentProcessor[] $processors
 * @property-read int|null $processors_count
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereMimeTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType withUuids(array $uuids)
 */
	class IdeHelperDocumentType {}
}

namespace Silber\Bouncer\Database{
/**
 * Silber\Bouncer\Database\Ability
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property int|null $entity_id
 * @property string|null $entity_type
 * @property bool $only_owned
 * @property array $options
 * @property int|null $scope
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $identifier
 * @property-read string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Ability byName($name, $strict = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability forModel($model, $strict = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability simpleAbility()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereOnlyOwned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperAbility {}
}

namespace Silber\Bouncer\Database{
/**
 * Silber\Bouncer\Database\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 * @property int|null $level
 * @property int|null $scope
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereAssignedTo($model, ?array $keys = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereScope($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperRole {}
}

namespace Spatie\MediaLibrary\MediaCollections\Models{
/**
 * Spatie\MediaLibrary\MediaCollections\Models\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $generated_conversions
 * @property array $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @property-read mixed $original_url
 * @property-read mixed $preview_url
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 * @mixin \Eloquent
 */
	class IdeHelperMedia {}
}

