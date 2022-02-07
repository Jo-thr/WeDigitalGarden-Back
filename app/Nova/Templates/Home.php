<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

use Laravel\Nova\Panel;

class Home extends Template 
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Templates\Home::class;

    public static $type = 'page';
    public static $name = 'Home';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            new Panel('Header', $this->block1()),
            new Panel('Mission', $this->block2()),
            new Panel('Projets', $this->block2()),
            new Panel('Bureaux', $this->block4()),
        ];
    }

    protected function block1()
    {
        return [
            NovaTrumbowyg::make('Subtitle')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:255'),

            Images::make('Photo', 'home')
                ->enableExistingMedia('home')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                // ->rules('required')
                // ->help('size is 680*790px')
                // ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }

    protected function block2()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('required', 'max:255'),
        ];
    }

    protected function block3()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle', 'subtitle')
        ];
    }

    protected function block4()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('required', 'max:255'),

        ];
    }
}
