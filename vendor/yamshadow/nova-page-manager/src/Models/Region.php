<?php

namespace OptimistDigital\NovaPageManager\Models;

use OptimistDigital\NovaPageManager\NovaPageManager;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Region extends TemplateModel implements HasMedia
{
    use InteractsWithMedia;
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(NovaPageManager::getRegionsTableName());
    }
}
