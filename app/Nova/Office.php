<?php

namespace App\Nova;

use App\Traits\AuditNova;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use MichielKempen\NovaOrderField\Orderable;

use MichielKempen\NovaOrderField\OrderField;

class Office extends Resource
{
    use AuditNova, Orderable;

    public static $defaultOrderField = 'order';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Office::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public function title()
    {
        return 'Office from '.$this->country;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'address', 'postal_code', 'city', 'country'
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

            Text::make('Office', function () {
                return $this->title();
            })->onlyOnIndex(),

            Text::make('Address', 'address')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:500'),
            
            Number::make('Postal Code', 'postal_code')
                ->sortable()
                ->hideFromIndex()
                ->rules('required'),

            Text::make('City', 'city')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Text::make('Country', 'country')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Images::make('Photo', 'offices')
                ->enableExistingMedia('offices')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required')
                ->help('Size is 680*790px. Only jpg, jpeg or png formats')
                ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),

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
