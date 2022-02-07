<?php

namespace App\Nova;

use App\Traits\AuditNova;
use OptimistDigital\NovaLocaleField\LocaleField;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Boolean;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;
use Laravel\Nova\Fields\Number;
use \OptimistDigital\NovaLocaleField\Filters\LocaleFilter;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;


class Formule extends Resource
{
    use AuditNova, Orderable;

    public static $defaultOrderField = 'order';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Formule::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title', 'subtitle'
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

            LocaleField::make('Locale', 'locale', 'locale_parent_id'),

            Text::make('Name', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('max:255'),

            Number::make('price')
                ->sortable()
                ->rules('required'),

            Boolean::make('Full-time offer', 'option_1')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('No engagement', 'option_2')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Free spot', 'option_3')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Super fast WiFi', 'option_4')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Unlimited access to the printer', 'option_5')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Free coffee', 'option_6')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Access to the kitchen', 'option_7')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Meeting rooms access', 'option_8')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Event spaces access', 'option_9')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Special offers with our SaaS members', 'option_10')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Unlimited access to a slack workspace with our community of experts', 'option_11')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Dedicated coaching with the expert', 'option_12')
                ->sortable()
                ->hideFromIndex(),

            OrderField::make('Order'),
            $this->getAudit(),
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
        return [
            new LocaleFilter('locale'),
        ];
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
