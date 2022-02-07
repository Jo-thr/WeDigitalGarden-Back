<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Laravel\Nova\Fields\Textarea;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

use Laravel\Nova\Panel;

class Startup extends Template
{
    public static $type = 'page';
    public static $name = 'Startup';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            new Panel('Block 1', $this->block1()),
            new Panel('Block 2', $this->block2()),
            new Panel('Block 4', $this->block3()),
            new Panel('Block 5', $this->block4()),
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

            Images::make('Photo', 'startup')
                ->enableExistingMedia('startup')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
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

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Photo', 'startup')
                ->enableExistingMedia('startup')
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

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Photo', 'startup')
                ->enableExistingMedia('startup')
                ->customPropertiesFields([
                    Text::make('Description'),
                ])
                ->rules('required'),
                // ->help('size is 680*790px')
                // ->singleImageRules(['dimensions:width=680,height:790'], ['mimetypes:image/jpg,image/jpeg,image/png']),
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

            Text::make('Label of Price', 'label_price')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Label of button', 'label_button')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Option 1', 'option_1')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 2', 'option_2')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 3', 'option_3')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 4', 'option_4')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 5', 'option_5')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 6', 'option_6')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 7', 'option_7')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 8', 'option_8')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 9', 'option_9')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 10', 'option_10')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 11', 'option_11')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),

            NovaTrumbowyg::make('Option 12', 'option_12')->withMeta(['options' => [
                'btns' => [
                    ['strong', 'viewhtml'],
                ]
            ]])->rules('required', 'max:1000'),
        ];
    }

}
