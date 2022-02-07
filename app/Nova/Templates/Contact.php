<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Laravel\Nova\Fields\Text;

class Contact extends Template
{
    public static $type = 'page';
    public static $name = 'Contact';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Subtitle', 'subtitle')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Name of Link for Google Map', 'name_link')
                ->sortable()
                ->rules('required', 'max:255'),
        ];
    }
}
