<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;

class Production extends Template
{
    public static $type = 'page';
    public static $name = 'Production';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            Text::make('Title', 'title')
                ->sortable()
                ->rules('required', 'max:255'),

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
}
