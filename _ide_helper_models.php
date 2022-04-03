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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \App\Models\Branch|null $branch
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsNot($role)
 */
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property-read \Kalnoy\Nestedset\Collection|Branch[] $children
 * @property-read int|null $children_count
 * @property-read array $translations
 * @property-read Branch|null $parent
 * @property-write mixed $parent_id
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
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsAfter($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsBefore($id, $boolean = 'and')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsLeaf()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereIsRoot()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch whereNotDescendantOf($id)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch withDepth(string $as = 'depth')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch withoutRoot()
 */
	class IdeHelperBranch {}
}

namespace App\Models{
/**
 * App\Models\BranchType
 *
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Branch[] $branches
 * @property-read int|null $branches_count
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType query()
 */
	class IdeHelperBranchType {}
}

namespace App\Models{
/**
 * App\Models\CourseWork
 *
 * @property \App\Enums\CourseWorkType $type
 * @property \App\Enums\CourseWorkStatus $status
 * @property-read array $translations
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Student|null $student
 * @property-read \App\Models\Supervisor|null $supervisor
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork withUuids(array $uuids)
 */
	class IdeHelperCourseWork {}
}

namespace App\Models{
/**
 * App\Models\Section
 *
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Media|null $media
 * @property-read Section|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Section newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Section query()
 * @method static \Illuminate\Database\Eloquent\Builder|Section withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|Section withUuids(array $uuids)
 */
	class IdeHelperSection {}
}

namespace App\Models{
/**
 * App\Models\SectionBlock
 *
 * @property-read \App\Models\Section|null $section
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|SectionBlock withUuids(array $uuids)
 */
	class IdeHelperSectionBlock {}
}

namespace App\Models{
/**
 * App\Models\Student
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \App\Models\Branch|null $branch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseWork[] $courseWorks
 * @property-read int|null $course_works_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIsNot($role)
 */
	class IdeHelperStudent {}
}

namespace App\Models{
/**
 * App\Models\Supervisor
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \App\Models\Branch|null $branch
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIsNot($role)
 */
	class IdeHelperSupervisor {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessingRule
 *
 * @property \App\Enums\CourseWorkType $course_work_type
 * @property \App\Enums\DocumentProcessingRuleStatus $status
 * @property-read \Domain\DocumentProcessing\Models\DocumentProcessor|null $processor
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessingRule withUuids(array $uuids)
 */
	class IdeHelperDocumentProcessingRule {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessor
 *
 * @property \App\Enums\DocumentProcessorStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessor withUuids(array $uuids)
 */
	class IdeHelperDocumentProcessor {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessorDocumentType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentProcessorDocumentType query()
 */
	class IdeHelperDocumentProcessorDocumentType {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentType
 *
 * @property \App\Enums\DocumentTypeStatus $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Domain\DocumentProcessing\Models\DocumentProcessor[] $processors
 * @property-read int|null $processors_count
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType withUuids(array $uuids)
 */
	class IdeHelperDocumentType {}
}

namespace Silber\Bouncer\Database{
/**
 * Silber\Bouncer\Database\Ability
 *
 * @property-read string $identifier
 * @property array $options
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
 * @mixin \Eloquent
 */
	class IdeHelperAbility {}
}

namespace Silber\Bouncer\Database{
/**
 * Silber\Bouncer\Database\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Student[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereAssignedTo($model, ?array $keys = null)
 * @mixin \Eloquent
 */
	class IdeHelperRole {}
}

namespace Spatie\MediaLibrary\MediaCollections\Models{
/**
 * Spatie\MediaLibrary\MediaCollections\Models\Media
 *
 * @property-read string $type
 * @property-read string $extension
 * @property-read string $humanReadableSize
 * @property-read string $previewUrl
 * @property-read string $originalUrl
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @mixin \Eloquent
 */
	class IdeHelperMedia {}
}

