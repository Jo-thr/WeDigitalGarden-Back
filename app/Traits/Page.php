<?php

namespace App\Traits;

use App\Traits\MultiLanguage;

trait Page
{
    use MultiLanguage;

    private $page = null;
    private $language = null;
    private $regions = null;
    private $models = null;
    private $custom_values = null;

    public function initAdditionalData($page, $language = null)
    {
        $this->language = $language;
        $this->page = $this->getPage($page);
        // Get resources
        $data['models'] = $this->getDataOfModels();
        // Get Regions
        $data['regions'] = $this->getDataOfRegions();

        return $data;
    }

    /**
     * Function qui permet de determiner la bonne page à récupérer
     *
     * @param string $page
     */
    public function getPage($page)
    {
        switch($page) {
            case 'Home':
                $this->models = [
                    'expertise',
                    'usecase',
                    'App\Models\Client',
                    'App\Models\Office',
                ];
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = null;
                return 'Home';
                break;
            case 'Projets':
                $this->models = [
                    'usecase',
                ];
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = null;
                return 'Projets';
                break;
            case 'Framework':
                $this->models = [
                    'value',
                    'certification',
                ];
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = null;
                return 'Framework';
                break;
            case 'Startup':
                $this->models = [
                    'formule'
                ];
                $this->regions = [
                    'contact-startup'
                ];
                $this->custom_values = null;
                return 'Startup';
                break;
            case 'Value':
                $this->models = null;
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = null;
                return 'Value';
                break;
            case 'Contact':
                $this->models = [
                    'App\Models\Office'
                ];
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = [
                    'talent' => [
                        'dark' => true,
                    ],
                ];
                return 'Contact';
                break;
            case 'Policy':
                $this->models = null;
                $this->regions = [
                    'talent'
                ];
                $this->custom_values = null;
                return 'Policy';
                break;
            case 'Team':
                $this->models = [
                    'team'
                ];
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = null;
                return 'Team';
                break;
            case 'Production':
                $this->models = [
                    'usecase'
                ];
                $this->regions = [
                    'contact',
                    'talent'
                ];
                $this->custom_values = null;
                return 'Production';
                break;
            case 'Error':
                $this->models = null;
                $this->regions = null;
                $this->custom_values = null;
                return 'Error';
                break;
            default:
                \Log::error('An error occured while get page in page traits.');
                throw new \Exception('An error occured while get page in page traits.', 500);
                break;
        }
    }

    public function getDataOfModels()
    {
        $data = [];

        if($this->models) {
            foreach($this->models as $model) {
                $explode = explode('\\', $model);
                if(count($explode) < 2)
                    $data[$model.'s'] = $this->initMultiLanguage($model, null, $this->language);
                else {
                    $resources = 'App\Http\Resources\\'.$explode[2].'CollectionResource';

                    $data[strtolower($explode[2]).'s'] = new $resources($model::all());
                }
            }
        }

        return $data;
    }

    public function getDataOfRegions()
    {
        $data = [];
        if($this->regions) {
            foreach($this->regions as $region) {
                $data[$region] = $this->initMultiLanguage($region, null, $this->language, $this->custom_values);
            }
        }

        return $data;
    }

}
