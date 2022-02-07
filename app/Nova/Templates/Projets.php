<?php

namespace App\Nova\Templates;

use Illuminate\Http\Request;
use OptimistDigital\NovaPageManager\Template;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;
use Johnathan\NovaTrumbowyg\NovaTrumbowyg;
use Laravel\Nova\Panel;

class Projets extends Template
{
    public static $type = 'page';
    public static $name = 'Projets';
    public static $seo = true;
    public static $view = null;

    public function fields(Request $request): array
    {
        return [
            new Panel('Block 1', $this->block1()),
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
        ];
    }
}
