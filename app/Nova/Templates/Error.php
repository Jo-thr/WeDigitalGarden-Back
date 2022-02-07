<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Laravel\Nova\Fields\Text;

class Error extends Template
{
    public static $type = 'page';
    public static $name = 'Error';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Text::make('Message for 404 page', '404_message')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Message for others errors', 'error_message')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Top link text', 'back_link')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Lower link text', 'bottom_link')
                ->sortable()
                ->rules('required', 'max:255'),
                
            Text::make('Lower link url', 'bottom_url')
                ->sortable()
                ->rules('required', 'max:255'),
        ];
    }
}
