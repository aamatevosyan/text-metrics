<?php

namespace App\Nova;

use App\Nova\Actions\ResetUserPassword;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;

class Supervisor extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Supervisor::class;

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Users';

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
        'email',
    ];

    public static $with = [
        'branch',
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

            Text::make('Name')
                ->rules('required', 'string')
                ->sortable(),

            Text::make('Email')
                ->rules('required', 'email')
                ->creationRules('unique:supervisors,email')
                ->updateRules('unique:supervisors,email,{{resourceId}}')
                ->sortable(),

            BelongsTo::make('Branch')->sortable()->filterable(),

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
        return [
            new ResetUserPassword,
        ];
    }

    public function subtitle(): string
    {
        return $this->branch->name;
    }
}
