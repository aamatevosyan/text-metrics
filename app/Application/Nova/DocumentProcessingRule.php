<?php

namespace App\Nova;

use App\Enums\CourseWorkType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Enum;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class DocumentProcessingRule extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Domain\DocumentProcessing\Models\DocumentProcessingRule::class;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Processing';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Uuid')->hideWhenCreating()->hideWhenUpdating(),

            Enum::make('Course Work Type')
                ->attach(CourseWorkType::class)
                ->creationRules(
                    'nullable',
                    Rule::unique('document_processing_rules', 'course_work_type')
                        ->where('branch_id', $this->branch_id)
                        ->where('document_processor_id', $this->document_processor_id)
                )
                ->updateRules(
                    'nullable',
                    Rule::unique('document_processing_rules', 'course_work_type')
                        ->where('branch_id', $this->branch_id)
                        ->where('document_processor_id', $this->document_processor_id)
                        ->ignore('{{resourceId}}')
                )
                ->sortable(),

            BelongsTo::make('Branch')->nullable()->sortable()->filterable(),

            BelongsTo::make('Document Processor', 'documentProcessor')->sortable()->filterable(),

            Code::make('config')
                ->json()
                ->showOnDetail(fn() => (bool) $this->config)
                ->showOnUpdating(fn() => (bool) $this->config),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
