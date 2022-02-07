<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use OptimistDigital\NovaPageManager\Template;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

class Talent extends Template
{
    public static $type = 'region';
    public static $name = 'Talent';

    public function fields(Request $request): array
    {
        return [
            NovaTrumbowyg::make('Title')->withMeta(['options' => [
                'btns' => []
            ]])->rules('required', 'max:255'),

            NovaTrumbowyg::make('Subtitle')->withMeta(['options' => [
                'btns' => [
                    ['link'],
                ]
            ]])->rules('required', 'max:255'), 
            
            Text::make('Link', 'link')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:255'),
        ];
    }
}
