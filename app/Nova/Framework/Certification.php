<?php

namespace App\Nova\Framework;

use Illuminate\Http\Request;
use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Traits\AuditNova;
use OptimistDigital\NovaLocaleField\LocaleField;

use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;
use \OptimistDigital\NovaLocaleField\Filters\LocaleFilter;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Yna\NovaSwatches\Swatches;

class Certification extends Resource
{
    use AuditNova, Orderable;

    public static $defaultOrderField = 'level';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Framework\Certification::class;

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

            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('required', 'max:255'),

            Images::make('Picture', 'picture')
                ->enableExistingMedia('picture')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required')
                // ->help('size is 2848*1546px')
                ->singleImageRules(
                    // ['dimensions:width=2848,height:1546'],
                    ['mimetypes:image/jpg,image/jpeg,image/png']
                ),

            Swatches::make('Color')
                ->colors(['#31388B', '#EE6856', '#49917D'])
                ->rules('required'),

            Images::make('Picture Flip', 'flip_picture')
                ->enableExistingMedia('flip_picture')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
                // ->help('size is 2848*1546px')
                // ->singleImageRules(
                //     // ['dimensions:width=2848,height:1546'],
                //     ['mimetypes:image/jpg,image/jpeg,image/png']
                // ),

            Text::make('Who', 'who')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('First item of What', 'what_1')
                ->sortable()
                ->rules('required', 'max:100'),

            Text::make('Second item of What', 'what_2')
                ->sortable()
                ->rules('max:100'),

            Text::make('Third item of What', 'what_3')
                ->sortable()
                ->rules('max:100'),

            Text::make('How', 'how')
                ->sortable()
                ->rules('required', 'max:255'),

            OrderField::make('Level'),
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
