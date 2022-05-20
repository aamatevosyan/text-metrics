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
 * @method static \Database\Factories\AdminFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Query\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsNot($role)
 * @method static \Illuminate\Database\Query\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Admin withoutTrashed()
 */
	class IdeHelperAdmin {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property-read \App\Models\BranchType|null $branchType
 * @property-read \Kalnoy\Nestedset\Collection|Branch[] $children
 * @property-read int|null $children_count
 * @property-read Branch|null $parent
 * @property-write mixed $parent_id
 * @method static \Kalnoy\Nestedset\Collection|static[] all($columns = ['*'])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch ancestorsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch ancestorsOf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch applyNestedSetScope(?string $table = null)
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch countErrors()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch d()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch defaultOrder(string $dir = 'asc')
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch descendantsAndSelf($id, array $columns = [])
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static \Database\Factories\BranchFactory factory(...$parameters)
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
 * @method static \Illuminate\Database\Query\Builder|Branch onlyTrashed()
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
 * @method static \Illuminate\Database\Query\Builder|Branch withTrashed()
 * @method static \Kalnoy\Nestedset\QueryBuilder|Branch withoutRoot()
 * @method static \Illuminate\Database\Query\Builder|Branch withoutTrashed()
 */
	class IdeHelperBranch {}
}

namespace App\Models{
/**
 * App\Models\BranchType
 *
 * @property-read \Kalnoy\Nestedset\Collection|\App\Models\Branch[] $branches
 * @property-read int|null $branches_count
 * @method static \Database\Factories\BranchTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType newQuery()
 * @method static \Illuminate\Database\Query\Builder|BranchType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BranchType query()
 * @method static \Illuminate\Database\Query\Builder|BranchType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|BranchType withoutTrashed()
 */
	class IdeHelperBranchType {}
}

namespace App\Models{
/**
 * App\Models\CourseWork
 *
 * @property \App\Enums\CourseWorkType $type
 * @property \App\Enums\CourseWorkStatus $status
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Student|null $student
 * @property-read \App\Models\Supervisor|null $supervisor
 * @method static \Database\Factories\CourseWorkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork newQuery()
 * @method static \Illuminate\Database\Query\Builder|CourseWork onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork query()
 * @method static \Illuminate\Database\Query\Builder|CourseWork withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseWork withUuids(array $uuids)
 * @method static \Illuminate\Database\Query\Builder|CourseWork withoutTrashed()
 */
	class IdeHelperCourseWork {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property \Spatie\LaravelData\Data|null $content
 * @property-read \App\Models\CourseWork|null $courseWork
 * @property-read \Domain\Metrics\Models\DocumentMetricResult|null $documentMetricResult
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Media|null $media
 * @property-read \Domain\Metrics\Models\MonitoredMetricResult|null $monitoredMetricResult
 * @method static \Database\Factories\DocumentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Query\Builder|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Query\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withUuids(array $uuids)
 * @method static \Illuminate\Database\Query\Builder|Document withoutTrashed()
 */
	class IdeHelperDocument {}
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
 * @method static \Database\Factories\StudentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Query\Builder|Student onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereIsNot($role)
 * @method static \Illuminate\Database\Query\Builder|Student withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Student withoutTrashed()
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CourseWork[] $courseWorks
 * @property-read int|null $course_works_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\SupervisorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor newQuery()
 * @method static \Illuminate\Database\Query\Builder|Supervisor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|Supervisor whereIsNot($role)
 * @method static \Illuminate\Database\Query\Builder|Supervisor withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Supervisor withoutTrashed()
 */
	class IdeHelperSupervisor {}
}

namespace Domain\DocumentProcessing\Models{
/**
 * Domain\DocumentProcessing\Models\DocumentProcessingRule
 *
 * @property \App\Enums\CourseWorkType $course_work_type
 * @property \Domain\DocumentProcessing\Enums\DocumentProcessingRuleStatus $status
 * @property-read \Domain\DocumentProcessing\Models\DocumentProcessor|null $documentProcessor
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
 * @property \Domain\DocumentProcessing\Enums\DocumentProcessorStatus $status
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
 * @property \Domain\DocumentProcessing\Enums\DocumentTypeStatus $status
 * @property-read \Illuminate\Database\Eloquent\Collection|\Domain\DocumentProcessing\Models\DocumentProcessor[] $documentProcessor
 * @property-read int|null $document_processor_count
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType withUuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType withUuids(array $uuids)
 */
	class IdeHelperDocumentType {}
}

