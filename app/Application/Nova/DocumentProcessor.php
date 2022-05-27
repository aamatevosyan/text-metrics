<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class DocumentProcessor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Domain\DocumentProcessing\Models\DocumentProcessor::class;

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
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
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

            Text::make('Name')
                ->rules('required', 'string')
                ->creationRules('unique:document_processors,name')
                ->updateRules('unique:document_processors,name,{{resourceId}}')
                ->sortable(),

            Text::make('Slug')
                ->rules('required', 'string')
                ->creationRules('unique:document_processors,slug')
                ->updateRules('unique:document_processors,slug,{{resourceId}}')
                ->sortable(),

            Code::make('config')
                ->hideFromIndex()
                ->showOnDetail(fn() => (bool) $this->config)
                ->showOnUpdating(fn() => (bool) $this->config),

            BelongsToMany::make('Document Types'),

            HasMany::make('Document Processing Rules'),
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
