<?php

namespace App\Nova;

use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Spatie\NovaTranslatable\Translatable;

class Branch extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Branch::class;

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Number::make(' lft')
                ->rules('required', 'integer')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->sortable(),

            Number::make(' rgt')
                ->rules('required', 'integer')
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->sortable(),

            Translatable::make([
                Text::make('Name')
                    ->rules('required')
                    ->sortable(),
            ]),

            BelongsTo::make('Parent', 'parent', self::class)->nullable()->sortable()->searchable()->filterable(),
            BelongsTo::make('BranchType')->sortable()->searchable()->filterable(),

            Date::make('Created at')->hideWhenCreating()->hideWhenUpdating()->sortable()->filterable(),
            Date::make('Updated at')->hideWhenCreating()->hideWhenUpdating()->sortable()->filterable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
