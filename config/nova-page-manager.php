<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table name
    |--------------------------------------------------------------------------
    |
    | Set a custom table for Nova Page Manager to store its data.
    |
    */

    'table' => 'nova_page_manager',


    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    | Register all templates (for both pages and regions) here.
    |
    */

    'templates' => [
        \App\Nova\Templates\Home::class,
        \App\Nova\Templates\Contact::class,
        \App\Nova\Templates\Framework::class,
        \App\Nova\Templates\Team::class,
        \App\Nova\Templates\Value::class,
        \App\Nova\Templates\Policy::class,
        \App\Nova\Templates\Projets::class,
        \App\Nova\Templates\Startup::class,
        \App\Nova\Templates\Production::class,
        \App\Nova\Templates\Talent::class,
        \App\Nova\Templates\ContactForm::class,
        \App\Nova\Templates\ContactStartup::class,
        \App\Nova\Templates\CookieBanner::class,
        \App\Nova\Templates\Error::class,
    ],


    /*
    |--------------------------------------------------------------------------
    | Locales
    |--------------------------------------------------------------------------
    |
    | Set all the available locales as [key => name] pairs.
    |
    | For example ['en_US' => 'English'].
    |
    */

    'locales' => [
        'fr' => 'French',
        'en' => 'English'
    ],


    /*
    |--------------------------------------------------------------------------
    | Max locales shown on index
    |--------------------------------------------------------------------------
    |
    | Sets the number of locales shown on index. If the number of locales
    | exceeds the defined count, the locales will be shown only on the detail
    | view.
    |
    */

    'max_locales_shown_on_index' => 4,


    /*
    |--------------------------------------------------------------------------
    | Overwrite the page resource with a custom implementation
    |--------------------------------------------------------------------------
    |
    | Add a custom implementation of the Page resource.
    |
    | Return false if you want to disable the Page resource
    | and hide it from the sidebar.
    |
    */

    'page_resource' => null,


    /*
    |--------------------------------------------------------------------------
    | Overwrite the region resource with a custom implementation
    |--------------------------------------------------------------------------
    |
    | Add a custom implementation of the Region resource.
    |
    | Return false if you want to disable the Region resource
    | and hide it from the sidebar.
    |
    */

    'region_resource' => null,


    /*
    |--------------------------------------------------------------------------
    | Page URL
    |--------------------------------------------------------------------------
    |
    | If a closure is specified, a link to the page is shown next to
    | the page slug. The closure accepts a Page model as a paramater.
    |
    | Set to `null` if the link should not be displayed.
    |
    | Closure example:
    | function (Page $page) {
    |   return env('FRONTEND_URL') . '/' . $page->path;
    | }
    |
    */

    'page_url' => null,


    /*
    |--------------------------------------------------------------------------
    | Page path
    |--------------------------------------------------------------------------
    |
    | If a closure is specified, you can modify the page path before
    | it's finalized.
    |
    | The closure will be called with parameters (Page $page, $path).
    |
    | An example usecase is when you want to add a locale prefix to non-default
    | locale pages.
    |
    | Set to `null` if you do not wish to modify page paths.
    |
    */

    'page_path' => null
];
