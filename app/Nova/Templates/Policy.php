<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Laravel\Nova\Fields\Text;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

use Laravel\Nova\Panel;

class Policy extends Template
{
    public static $type = 'page';
    public static $name = 'Policy';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            new Panel('Block 1', $this->block1()),
            new Panel('Block 2', $this->block2()),
        ];
    }
    protected function block1()
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            NovaTrumbowyg::make('Content')->withMeta(['options' => [
                'btns' => [
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['unorderedList', 'orderedList'],
                    ['viewHTML']
                ]
            ]])->rules('required'),
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
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['unorderedList', 'orderedList'],
                    ['viewHTML']
                ]
            ]])->rules('required'),
        ];
    }
}
