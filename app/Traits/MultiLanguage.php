<?php

namespace App\Traits;

use App\Traits\Errors;

trait MultiLanguage
{
    use Errors;

    private $model = null;
    private $mode = null;  // si int, on est sur un mode ID. Si String, on est sur un mode slug
    private $language = null;
    private $resources = null;
    private $getter = null;

    private $order = false;
    private $region = false;
    private $additionnal_values = null; // array

    /**
     * Function initMultiLanguage qui permet de set les variables de classes
     *
     * @param string $model
     * @param string|int $mode
     * @param string $language
     */
    public function initMultiLanguage($model, $mode = null, $language = null, $custom_values = null)
    {
        $this->mode = $mode; // ID, SLUG
        $this->language = $language; // fr, en
        $this->additionnal_values = $custom_values;

        $this->model = $this->getModel($model);

        return $this->getData();
    }

    /**
     * Function qui permet de determiner le bon model à récupérer
     *
     * @param string $model
     */
    public function getModel($model)
    {
        $this->resources = 'App\Http\Resources\\';
        $this->additionnal_values = $this->getCustomValues($model, $this->additionnal_values);

        switch($model) {
            case 'expertise':
                $this->order = true;
                $this->resources .= 'Expertise'.$this->getResource();
                return 'App\Models\Expertise';
                break;
            case 'usecase':
                $this->order = true;
                $this->resources .= 'UseCase'.$this->getResource();
                return 'App\Models\UseCase';
                break;
            // case 'projets':
            //     $this->order = true;
            //     $this->resources .= 'Projets'.$this->getResource();
            //     return 'App\Models\Projets';
            //     break;
            case 'team':
                $this->order = true;
                $this->resources .= 'Team'.$this->getResource();
                return 'App\Models\Team';
                break;
            case 'formule':
                    $this->resources .= 'Formule'.$this->getResource();
                    return 'App\Models\Formule';
                    break;
            case 'value':
                $this->resources .= 'Value'.$this->getResource();
                return 'App\Models\Framework\Value';
                break;
            case 'certification':
                $this->resources .= 'Certification'.$this->getResource();
                return 'App\Models\Framework\Certification';
                break;
            case 'menu':
                $this->order = false;
                $this->resources .= 'Menu'.$this->getResource();
                $this->getter = 'menu';
                return 'App\Models\Menu';
                break;
            case 'page':
                $this->order = false;
                $this->resources .= 'Page'.$this->getResource();
                return 'App\Models\Page';
                break;
            case 'region':
                $this->order = false;
                switch($this->mode) {
                    case 'contact':
                        $this->region = 'Contact';
                    break;
                    case 'contact-startup':
                        $this->region = 'ContactStartup';
                    break;
                    case 'cookie-banner':
                        $this->region = 'CookieBanner';
                    break;
                    case 'talent':
                        $this->region = 'Talent';
                    break;
                }
                $this->mode = false;
                $this->resources .= 'Region'.$this->getResource();
                return 'App\Models\Region';
                break;
            case 'talent':
                $this->order = false;
                $this->region = 'Talent';
                $this->resources .= 'Regions\Talent'.$this->getResource();
                return 'App\Models\Region';
                break;
            case 'contact':
                $this->order = false;
                $this->region = 'Contact';
                $this->resources .= 'Regions\Contact'.$this->getResource();
                return 'App\Models\Region';
                break;
            case 'contact-startup':
                $this->order = false;
                $this->region = 'ContactStartup';
                $this->resources .= 'Regions\ContactStartup'.$this->getResource();
                return 'App\Models\Region';
                break;
            case 'cookieBanner':
                $this->order = false;
                $this->region = 'CookieBanner';
                $this->resources .= 'Regions\CookieBanner'.$this->getResource();
                return 'App\Models\Region';
                break;
            default:
                \Log::error('An error occured while get model in multilanguage traits.');
                throw new \Exception('An error occured while get model in multilanguage traits.', 500);
                break;
        }
    }

    /**
     * Function qui permet de construire l'appel de la bonne resource
     */
    public function getResource()
    {
        $resources  = '';
        if($this->language) $resources .= 'WithLang';
        if(!$this->mode) $resources .= 'Collection';

        return $resources .= 'Resource';
    }

    /**
     * Function qui permet de recuperer les variables customs d'un mode
     */
    public function getCustomValues($model, $custom_values)
    {
        if($custom_values && array_key_exists($model, $custom_values)) {
            return $custom_values[$model];
        }

        return false;
    }

    /**
     * Function qui centralise la récupération des données
     */
    public function getData()
    {
        $parent = $this->getParent();

        if(!$this->mode) {
            $collection = collect();

            foreach ($parent as $item) {

                $data = $this->checkRoute($item);
                $collection->add($data);

            }

            if ($collection->count()) {
                return new $this->resources($collection);
            }

        } else {
            if($parent) {

                $data = $this->checkRoute($parent);
                return new $this->resources($data);
            }
        }

        return $this->error404();
    }

    /**
     * Function qui determine le(s) bon(s) item(s) parent(s)
     */
    public function getParent()
    {
        if(!$this->mode) {
            if($this->order)
                return $this->model::where('locale_parent_id', null)->orderBy('order', 'asc')->get();
            else if($this->region) {
                return $this->model::where('locale_parent_id', null)->where('template', $this->region)->get();
            }
            else
                return $this->model::where('locale_parent_id', null)->get();
        }
        else {
            // determine si le mode est par ID ou par SLUG
            if(is_numeric($this->mode)) $item = $this->model::find($this->mode);
            else $item = $this->model::where('slug', $this->mode)->first();

            // Verifie si l'item est bien un parent, sinon le récupère
            if ($item && !is_null($item->locale_parent_id)) {
                $item = $this->model::where('id', $item->locale_parent_id)->first();
            }

            return $item;
        }

        \Log::error('An error occured while get parent in multilanguage traits.');
        throw new \Exception('An error occured while get parent in multilanguage traits.', 500);

    }

    /**
     * Fonction qui permet de récupérer les items enfants d'un item parent, ordonné par rapport à leurs langues
     */
    function getChildren($id) {

        $children = $this->model::where('locale_parent_id', $id)->get();
        $data = [];

        foreach ($children as $child) {
            $explode = explode('_', $child->locale);

            if($this->getter == 'menu') {
                $data[$explode[0]] = $this->getItemMenu($child);
            } else {
                $data[$explode[0]] = $child;
                // add custom variables
                if($this->additionnal_values) {
                    foreach($this->additionnal_values as $key => $value) {
                        $data[$explode[0]][$key] = $value;
                    }
                }
            }
        }

        return $data;
    }

    /**
     * Function qui permet de choisir le bon routage des data a renvoyer a la ressource
     */
    public function checkRoute($element)
    {
        //voie avec la traduction
        if($this->language) {
            if($this->getter == 'menu') {
                $item = (object) $this->getTraduction($element);
                $data = $this->getItemMenu($item);
            } else {
                $data = $this->getTraduction($element);
            }
        } else {
            // voie pour le menu
            if($this->getter == 'menu') {
                $data = $this->getItemMenu($element);
            } else {
                $data = $element;
            }
            $data['children'] = $this->getChildren($element->id);
        }

        // add custom variables on parent item
        if($this->additionnal_values) {
            foreach($this->additionnal_values as $key => $value) {
                $data->$key = $value;
            }
        }

        return $data;

    }

    /**
     * Function qui permet de recuperer les items d'un menu et d'en supprimer les elements désactivés
     */
    public function getItemMenu($menu)
    {
        $menu = nova_get_menu($menu->slug);

        foreach($menu['menuItems'] as $key => $item) {
            if($item['enabled'] == false) {
                unset($menu['menuItems'][$key]);
            }
        }

        return $menu;
    }

    /**
     * Function qui permet de chercher un item dans la bonne langue
     */
    function getTraduction($item)
    {
        $explode = explode('_', $item->locale);

        // check si la langue est celle chercher
        if ($this->language != $explode[0]) {

            // recupération des enfants pour chercher dans les autres langues
            $children = $this->getChildren($item->id);

            foreach ($children as $child) {
                $child = (object) $child;
                $explode = explode('_', $child->locale);

                if ($this->language == $explode[0]) {
                    $item = $child;
                    break;
                }
            }
        }
        return $item;
    }

}
