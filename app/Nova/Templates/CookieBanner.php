<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;


class CookieBanner extends Template
{
    public static $type = 'region';
    public static $name = 'CookieBanner';

    public function fields(Request $request): array
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),
            
            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('required', 'max:500'),

            Text::make('Label of Button', 'label_button')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Label of link', 'label_link')
                ->sortable()
                  ->rules('required', 'max:255'),

            Text::make('Slug of link', 'slug_link')
                ->sortable()
                ->rules('required', 'max:255'),
        ];
    }
}
