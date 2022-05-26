<?php

namespace App\Nova;

use Domain\DocumentProcessing\Enums\DocumentTypeStatus;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaItemsField\Items;
use Suleymanozev\EnumField\Enum;

class DocumentType extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Domain\DocumentProcessing\Models\DocumentType::class;

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
                ->creationRules('unique:document_types,name')
                ->updateRules('unique:document_types,name,{{resourceId}}')
                ->sortable(),

            Items::make('Mime Types')->rules([
                'mime_types.*' => 'required|string',
            ])->creationRules([
                'mime_types.*' => 'unique:document_types,mime_types'
            ])->updateRules([
                'mime_types.*' => 'unique:document_types,mime_types,{{resourceId}}'
            ])->hideFromIndex(),

            BelongsToMany::make('Document Processors'),
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
