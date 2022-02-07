<?php

namespace OptimistDigital\NovaLocaleField\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;
use OptimistDigital\NovaLocaleField\LocaleField;

class LocaleFilter extends Filter
{
    public $name = 'Locale';
    public $component = 'select-filter';
    protected $localeFieldKey;
    protected $locales;
    protected $defaultValue;

    /**
     * Creates the filter.
     *
     * @param string $localeFieldKey The model attribute that contains the locale.
     * @return \OptimistDigital\NovaLocaleField\Filters\LocaleFilter
     **/
    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }

    public function __construct($localeFieldKey = 'locale')
    {
        $this->localeFieldKey = $localeFieldKey;
        $this->locales = LocaleField::getLocales();
    }

    public function apply(Request $request, $query, $value)
    {
        return $query->where($this->localeFieldKey, $value);
    }

    public function options(Request $request)
    {
        return array_flip($this->locales);
    }

    /**
     * Set the locales for the filter.
     *
     * @param array $locales
     * @return OptimistDigital\NovaLocaleField\Filters\LocaleFilter
     **/
    public function locales($locales = [])
    {
        $this->locales = $locales;
        return $this;
    }

    /**
     * Set the default value for the filter.
     * Use empty string (`''`) to select nothing.
     *
     * @param $defaultValue
     * @return OptimistDigital\NovaLocaleField\Filters\LocaleFilter
     **/
    public function defaultValue($defaultValue = null)
    {
        $this->defaultValue = $defaultValue;
        return $this;
    }

    public function
    default()
    {
        return isset($this->defaultValue) ? $this->defaultValue : array_keys($this->locales)[0];
    }
}
