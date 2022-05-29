<?php

namespace App\Nova;

use App\Enums\CourseWorkStatus;
use App\Enums\CourseWorkType;
use App\Nova\Filters\TextMetricRange;
use App\Nova\Filters\TextMetricSlug;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Enum;
use Laravel\Nova\Fields\Filters\SelectFilter;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Spatie\NovaTranslatable\Translatable;
use Str;

class CourseWork extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\CourseWork::class;

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

            Text::make('Uuid')
                ->rules('required')
                ->hideFromIndex(),

            Translatable::make([
                Text::make('Name')
                    ->rules('required')
                    ->stacked()
                    ->sortable()
            ]),

            Number::make('Plagiat', 'plagiat_group_value')->readonly(),

            Number::make('Readability', 'readability_group_value')->readonly(),

            Number::make('Cohesion', 'cohesion_group_value')->readonly(),

            Number::make('Font', 'font_group_value')->readonly(),

            Number::make('Diversity', 'diversity_group_value')->readonly(),

            Enum::make('Type')->attach(CourseWorkType::class),

            BelongsTo::make('Student')->withSubtitles()->sortable()->filterable(),
            BelongsTo::make('Supervisor')->withSubtitles()->sortable()->filterable(),

            HasMany::make('Documents'),
            HasOne::make('MonitoredMetricResult', 'monitoredMetricResult'),

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
