<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Laravel\Nova\Fields\Textarea;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

use Laravel\Nova\Panel;

class Framework extends Template
{
    public static $type = 'page';
    public static $name = 'Framework';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            new Panel('Header', $this->block1()),
            new Panel('Result section', $this->block2()),
            new Panel('How Work section', $this->block3()),
            new Panel('Together section', $this->block4()),
            new Panel('Business section', $this->block5()),
            new Panel('Data section', $this->block6()),
        ];
    }

    protected function block1()
    {
        return [
            NovaTrumbowyg::make('Title')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),
        ];
    }

    protected function block2()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Photo', 'framework')
                ->enableExistingMedia('framework')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
                // ->help('size is 680*790px')
                // ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }

    protected function block3()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Bullet point 1', 'bullet_point_1')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Bullet point 2', 'bullet_point_2')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Bullet point 3', 'bullet_point_3')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),
        ];
    }

    protected function block4()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Photo', 'framework')
                ->enableExistingMedia('framework')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
                // ->help('size is 680*790px')
                // ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }

    protected function block5()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Photo', 'framework')
                ->enableExistingMedia('framework')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
                // ->help('size is 680*790px')
                // ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }

    protected function block6()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Photo', 'framework')
                ->enableExistingMedia('framework')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
                // ->help('size is 680*790px')
                // ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),
        ];
    }
}
