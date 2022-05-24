<?php

namespace App\Nova;

use App\Nova\Actions\ResetUserPassword;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\PasswordConfirmation;
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
                ->sortable(),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'alpha_num', 'min:8', 'confirmed')
                ->updateRules('nullable', 'alpha_num', 'min:8', 'confirmed'),

            PasswordConfirmation::make('Password Confirmation'),

            BelongsTo::make('Branch')->searchable()->sortable()->filterable(),

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
