<?php

namespace App\Nova\Framework;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Traits\AuditNova;
use OptimistDigital\NovaLocaleField\LocaleField;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;
use Laravel\Nova\Fields\Select;
use \OptimistDigital\NovaLocaleField\Filters\LocaleFilter;

class Value extends Resource
{
    use AuditNova, Orderable;

    public static $defaultOrderField = 'order';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Framework\Value::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The logical group associated with the resource.
     *
     * @var string
     */
    public static $group = 'Framework';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
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

            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Title when flip', 'title_flip')
                ->sortable()
                ->rules('required', 'max:255'),
                
            Select::make('Logo')->options([
                'counter' => 'Counter',
                'lightning' => 'Lightning',
                'plus' => 'Plus',
                'wallet' => 'Wallet',
            ])->displayUsingLabels(),
                
            Textarea::make('Resume', 'resume')
                ->sortable()
                ->rules('required', 'max:3000'),

            Textarea::make('Resume when flip', 'resume_flip')
                ->sortable()
                ->rules('required', 'max:3000'),

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
