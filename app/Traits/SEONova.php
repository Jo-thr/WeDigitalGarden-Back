<?php

namespace App\Traits;

use Gwd\SeoMeta\SeoMeta;
use Laravel\Nova\Panel;

trait SEONova
{
    public function getSEO()
    {
        return new Panel('SEO', $this->SEOFields());
    }

    protected function SEOFields()
    {
        return [
            SeoMeta::make('SEO', 'seo_meta')
        ];
    }
}
