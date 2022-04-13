<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;

class Student extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Student::class;

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Number::make('Branch id')
                ->rules('required', 'integer'),

            Text::make('Name')
                ->rules('required', 'string'),

            Text::make('Email')
                ->rules('required', 'email'),

            DateTime::make('Email verified at'),

            Text::make('Password')
                ->rules('required', 'password'),

            Text::make('Remember token')
                ->rules('string', 'max:100'),

            Text::make('Profile photo url')
                ->rules('string', 'max:2048'),

            Text::make('Two factor secret')
                ->rules('string'),

            Text::make('Two factor recovery codes')
                ->rules('string'),

            DateTime::make('Created at'),
            DateTime::make('Updated at'),

            MorphToMany::make('Roles', 'roles', 'Yadahan\BouncerTool\Nova\Role')->fields(function () {
                return [
                    Text::make('Scope')
                        ->sortable()
                        ->rules('nullable', 'integer'),
                ];
            }),

            MorphToMany::make('Abilities', 'abilities', 'Yadahan\BouncerTool\Nova\Ability')
                ->fields(new \Yadahan\BouncerTool\Nova\PermissionsFields),
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
