<?php

namespace App\Nova;

use App\Traits\AuditNova;
use OptimistDigital\NovaLocaleField\LocaleField;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;
use Yna\NovaSwatches\Swatches;
use \OptimistDigital\NovaLocaleField\Filters\LocaleFilter;

class Expertise extends Resource
{
    use AuditNova, Orderable;

    public static $defaultOrderField = 'order';
    
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Expertise::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Home';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'subtitle', 'description'
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

            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Slug', 'slug')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Subtitle', 'subtitle')
                ->sortable()
                ->nullable()
                ->hideFromIndex()
                ->rules('max:255'),

            Textarea::make('Description', 'description')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:500'),

            Swatches::make('Color')
                ->rules('required'),

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
