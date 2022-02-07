<?php

namespace App\Nova;

use App\Traits\AuditNova;
use OptimistDigital\NovaLocaleField\LocaleField;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Textarea;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use MichielKempen\NovaOrderField\Orderable;
use MichielKempen\NovaOrderField\OrderField;
use \OptimistDigital\NovaLocaleField\Filters\LocaleFilter;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

class Team extends Resource
{
    use AuditNova, Orderable;

    public static $defaultOrderField = 'order';
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Team::class;

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
        'name', 'position'
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
            
            Text::make('Position', 'position')
                ->sortable()
                ->rules('required', 'max:255'),

            Images::make('Avatar', 'avatar')
                ->enableExistingMedia('avatar')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required')
                ->help('size is 387*486px') 
                ->singleImageRules(['dimensions:width=387,height:486'], ['mimetypes:image/jpg,image/jpeg,image/png']),

            NovaTrumbowyg::make('Description')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

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
