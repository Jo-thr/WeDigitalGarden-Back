<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;
use Laravel\Nova\Fields\Text;

class Team extends Template
{
    public static $type = 'page';
    public static $name = 'Team';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
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
        ];
    }
}
