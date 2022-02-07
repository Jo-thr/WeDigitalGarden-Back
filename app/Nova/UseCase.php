<?php

namespace App\Nova;

use App\Traits\AuditNova;

use App\Traits\SEONova;
use OptimistDigital\NovaLocaleField\LocaleField;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use MichielKempen\NovaOrderField\Orderable;
use Laravel\Nova\Panel;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;
use Yna\NovaSwatches\Swatches;

use \OptimistDigital\NovaLocaleField\Filters\LocaleFilter;

use MichielKempen\NovaOrderField\OrderField;

class UseCase extends Resource
{
    use AuditNova, SEONova, Orderable;

    public static $defaultOrderField = 'order';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\UseCase::class;

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
            LocaleField::make('Locale', 'locale', 'locale_parent_id'),
            OrderField::make('Order'),

            new Panel('Information', $this->block1()),
            new Panel('Header', $this->block2()),
            new Panel('Content', $this->block3()),
            new Panel('Satisfaction', $this->block4()),
            $this->getSEO(),
            $this->getAudit(),
        ];
    }

    protected function block1()
    {
        return [
            Text::make('Name', 'name')
                ->sortable()
                  ->rules('required', 'max:255'),

            Text::make('Slug', 'slug')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),

            Swatches::make('Background-Color', 'background_color')
                ->colors('text-advanced')
                ->withProps([
                    'show-fallback' => true,
                    'fallback-type' => 'input',
                ])
                ->rules('required'),

            Images::make('Miniature', 'miniature')
                ->enableExistingMedia('use_cases')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required')
                ->help('Size is 496x396px. Only jpg, jpeg or png formats')
                ->singleImageRules(['dimensions:width=496,height:396'], ['mimetypes:image/jpg,image/jpeg,image/png']),

            NovaTrumbowyg::make('Resume')->withMeta(['options' => [
                    'btns' => [
                        ['formatting'],
                        ['strong', 'em'],
                        ['unorderedList', 'orderedList'],
                        ]
                ]])->rules('required'),

            BelongsTo::make('Client', 'client')
                ->sortable()
                ->rules('required'),

            Images::make('Logo', 'logo')
                ->enableExistingMedia('use_cases')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required')
                ->help('Only SVG format'),
                // ->singleImageRules('mimetypes:image/svg+xml'),

        ];
    }

    protected function block2()
    {
        return [
            Text::make('Title', 'title_article')
                ->sortable()
                    ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Description', 'description')->withMeta(['options' => [
                    'btns' => [
                        ['formatting'],
                        ['strong', 'em'],
                        ['unorderedList', 'orderedList'],
                        ]
                ]])->rules('required'),

            Images::make('Image banner', 'img_banner')
                ->enableExistingMedia('use_cases')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required')
                ->help('Size is 1440x810px. Only jpg, jpeg or png formats')
                ->singleImageRules(['dimensions:width=1440,height:810'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }

    protected function block3()
    {
        return [
            Text::make('Subtitle 1', 'subtitle_1')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Paragraph 1', 'paragraph_1')->withMeta(['options' => [
                    'btns' => [
                        ['formatting'],
                        ['strong', 'em'],
                        ['unorderedList', 'orderedList'],
                        ]
                ]])->rules('required'),

            Images::make('Image 1', 'image_1')
                ->enableExistingMedia('use_cases')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->help('Only jpg, jpeg or png formats')
                ->singleImageRules(['mimetypes:image/jpg,image/jpeg,image/png']),

            Text::make('Subtitle 2', 'subtitle_2')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Paragraph 2', 'paragraph_2')->withMeta(['options' => [
                    'btns' => [
                        ['formatting'],
                        ['strong', 'em'],
                        ['unorderedList', 'orderedList'],
                        ]
                ]])->rules('required'),

            Images::make('Image 2', 'image_2')
                ->enableExistingMedia('use_cases')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->help('Only jpg, jpeg or png formats')
                ->singleImageRules(['mimetypes:image/jpg,image/jpeg,image/png']),

                Text::make('Subtitle 3', 'subtitle_3')
                ->sortable()
                 ->rules('max:255'),

            NovaTrumbowyg::make('Paragraph 3', 'paragraph_3')->withMeta(['options' => [
                    'btns' => [
                        ['formatting'],
                        ['strong', 'em'],
                        ['unorderedList', 'orderedList'],
                        ]
                ]]),

            Images::make('Image 3', 'image_3')
                ->enableExistingMedia('use_cases')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->help('Only jpg, jpeg or png formats')
                ->singleImageRules(['mimetypes:image/jpg,image/jpeg,image/png']),

            Images::make('Image footer', 'img_footer')
            ->enableExistingMedia('use_cases')
            ->customPropertiesFields([
                Text::make('Description'),
            ])
            ->rules('required')
            ->help('Size is 1440x810px. Only jpg, jpeg or png formats')
            ->singleImageRules(['dimensions:width=1440,height:810'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }
    protected function block4()
    {
        return [
            Text::make('Title', 'title_satisfaction')
                ->sortable()
                          ->rules('required', 'max:255'),

            Swatches::make('Section Color', 'section_color')
                ->colors('text-advanced')
                ->withProps([
                    'show-fallback' => true,
                    'fallback-type' => 'input',
                ])
                ->rules('required'),

            NovaTrumbowyg::make('Commentaire', 'comment')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'em'],
                ]
            ]])->rules('required', 'max:1000'),

            Text::make('Auteur', 'auteur')
                ->sortable()
                  ->rules('max:255'),

            Text::make('Poste auteur', 'poste_auteur')
            ->sortable()
            ->rules('max:255'),

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
