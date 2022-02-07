<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;

use Laravel\Nova\Panel;

class Value extends Template
{
    public static $type = 'page';
    public static $name = 'Value';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            new Panel('Header', $this->block1()),
            new Panel('Statistiques', $this->block2()),
            new Panel('Values', $this->block3())
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
                    ['strong'],
                ]
            ]])->rules('required', 'max:1000'),

            Images::make('Image banner', 'background')
                ->enableExistingMedia('background')
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

            Number::make('Number/Pourcentage 1', 'content_stat_1')
                ->sortable()
                ->rules('required', 'max:255'),
                
            Text::make('Name Stats 1', 'title_stat_1')
                ->sortable()
                ->rules('required', 'max:255'),

            Number::make('Number/Pourcentage 2', 'content_stat_2')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Name Stats 2', 'title_stat_2')
                ->sortable()
                 ->rules('required', 'max:255'),

            Number::make('Number/Pourcentage 3', 'content_stat_3')
                ->sortable()
                ->rules('required', 'max:255'),  
            
            Text::make('Name Stats 3', 'title_stat_3')
                ->sortable()
                 ->rules('required', 'max:255'),
  
        ];
    }

    protected function block3()
    {
        return [
            Textarea::make('Paragraphe', 'paragraph')
                ->sortable()
                    ->hideFromIndex()
                ->rules('required', 'max:500'),

            Text::make('Value 1', 'title_1')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Description 1', 'description_1')
                ->sortable()
                  ->hideFromIndex()
                ->rules('required', 'max:500'),

            Text::make('Value 2', 'title_2')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Description 2', 'description_2')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:500'),
                
            Text::make('Value 3', 'title_3')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make('Description 3', 'description_3')
                ->sortable()
                ->hideFromIndex()
                ->rules('required', 'max:500'),    
        ];
    }

}
