<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['throttle:60,1'])->group(function () {

    // Offices
    Route::get('/offices', 'Api\OfficeController@index')->name('office.all');
    Route::get('/offices/{id}', 'Api\OfficeController@getOne')->where('id', '^[0-9]*$')->name('office.id');

    // Expertises
    Route::get('/expertises', 'Api\ExpertiseController@index')->name('expertise.all');
    Route::get('/expertises/{lang}', 'Api\ExpertiseController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('expertise.lang');
    Route::get('/expertises/{id}', 'Api\ExpertiseController@getOne')->where('id', '^[0-9]*$')->name('expertise.id');
    Route::get('/expertises/{slug}', 'Api\ExpertiseController@getOneBySlug')->where('slug', '^[a-z+-]*$')->name('expertise.slug');
    Route::get('/expertises/{id}/{lang}', 'Api\ExpertiseController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]{2}$')->name('expertise.id.lang');
    Route::get('/expertises/{slug}/{lang}', 'Api\ExpertiseController@getOneBySlugWithLang')->where('slug', '^[a-z+-]*$')->where('lang', '^[a-z]{2}$')->name('expertise.slug.lang');

    // Framework Values
    Route::get('/framework/values', 'Api\Framework\ValueController@index')->name('framework.value.all');
    Route::get('/framework/values/{lang}', 'Api\Framework\ValueController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('framework.value.lang');
    Route::get('/framework/values/{id}', 'Api\Framework\ValueController@getOne')->where('id', '^[0-9]*$')->name('framework.value.id');
    Route::get('/framework/values/{id}/{lang}', 'Api\Framework\ValueController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]{2}$')->name('framework.value.id.lang');

    // Framework Certifications
    Route::get('/framework/certifications', 'Api\Framework\CertificationController@index')->name('framework.certification.all');
    Route::get('/framework/certifications/{lang}', 'Api\Framework\CertificationController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('framework.certification.lang');
    Route::get('/framework/certifications/{id}', 'Api\Framework\CertificationController@getOne')->where('id', '^[0-9]*$')->name('framework.certification.id');
    Route::get('/framework/certifications/{id}/{lang}', 'Api\Framework\CertificationController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]{2}$')->name('framework.certification.id.lang');

    // Clients
    Route::get('/clients', 'Api\ClientController@index')->name('client.all');
    Route::get('/clients/{id}', 'Api\ClientController@getOne')->where('id', '^[0-9]*$')->name('client.id');

    // Social Media
    Route::get('/social-media', 'Api\SocialMediaController@index')->name('social-media.all');
    Route::get('/social-media/{id}', 'Api\SocialMediaController@getOne')->where('id', '^[0-9]*$')->name('social-media.id');

    // Teams
    Route::get('/teams', 'Api\TeamController@index')->name('team.all');
    Route::get('/teams/{lang}', 'Api\TeamController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('team.lang');
    Route::get('/teams/{id}', 'Api\TeamController@getOne')->where('id', '^[0-9]*$')->name('team.id');
    Route::get('/teams/{id}/{lang}', 'Api\TeamController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]{2}$')->name('team.id.lang');

    // Use Cases
    Route::get('/use-cases', 'Api\UseCaseController@index')->name('use-case.all');
    Route::get('/use-cases/{lang}', 'Api\UseCaseController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('use-case.lang');
    Route::get('/use-cases/{id}', 'Api\UseCaseController@getOne')->where('id', '^[0-9]*$')->name('use-case.id');
    Route::get('/use-cases/{id}/{lang}', 'Api\UseCaseController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]{2}$')->name('use-case.id.lang');
    Route::get('/use-cases/{slug}', 'Api\UseCaseController@getOneBySlug')->where('slug', '^[a-z+-]*$')->name('use-case.slug');
    Route::get('/use-cases/{slug}/{lang}', 'Api\UseCaseController@getOneBySlugWithLang')->where('slug', '^[a-z+-]*$')->where('lang', '^[a-z]{2}$')->name('use-case.slug.lang');

    // Menus
    Route::get('/menus', 'Api\MenuController@index')->name('menu.all');
    Route::get('/menus/{lang}', 'Api\MenuController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('menu.lang');
    Route::get('/menus/{id}', 'Api\MenuController@getOne')->where('id', '^[0-9]*$')->name('menu.id');
    Route::get('/menus/{id}/{lang}', 'Api\MenuController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]*$')->name('menu.id.lang');
    Route::get('/menus/{slug}', 'Api\MenuController@getOneBySlug')->where('slug', '^[a-z+-]*$')->name('menu.slug');
    Route::get('/menus/{slug}/{lang}', 'Api\MenuController@getOneBySlugWithLang')->where('slug', '^[a-z+-]*$')->where('lang', '^[a-z]{2}$')->name('menu.slug.lang');

    // Pages
    Route::get('/pages', 'Api\PageController@index')->name('page.all');
    Route::get('/pages/{lang}', 'Api\PageController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('page.lang');
    Route::get('/pages/{id}', 'Api\PageController@getOne')->where('id', '^[0-9]*$')->name('page.id');
    Route::get('/pages/{id}/{lang}', 'Api\PageController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]*$')->name('page.id.lang');
    Route::get('/pages/{slug}', 'Api\PageController@getOneBySlug')->where('slug', '^[a-z+-]*$')->name('page.slug');
    Route::get('/pages/{slug}/{lang}', 'Api\PageController@getOneBySlugWithLang')->where('slug', '^[a-z+-]*$')->where('lang', '^[a-z]{2}$')->name('page.slug.lang');

    // Regions
    Route::get('/regions', 'Api\RegionController@index')->name('region.all');
    Route::get('/regions/{lang}', 'Api\RegionController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('region.lang');
    Route::get('/regions/{id}', 'Api\RegionController@getOne')->where('id', '^[0-9]*$')->name('region.id');
    Route::get('/regions/{id}/{lang}', 'Api\RegionController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]*$')->name('region.id.lang');
    Route::get('/regions/{slug}', 'Api\RegionController@getOneBySlug')->where('slug', '^[a-z+-]*$')->name('region.slug');
    Route::get('/regions/{slug}/{lang}', 'Api\RegionController@getOneBySlugWithLang')->where('slug', '^[a-z+-]*$')->where('lang', '^[a-z]{2}$')->name('region.slug.lang');

    // Formules
    Route::get('/formules', 'Api\FormuleController@index')->name('formule.all');
    Route::get('/formules/{lang}', 'Api\FormuleController@getAllWithLang')->where('lang', '^[a-z]{2}$')->name('formule.lang');
    Route::get('/formules/{id}', 'Api\FormuleController@getOne')->where('id', '^[0-9]*$')->name('formule.id');
    Route::get('/formules/{id}/{lang}', 'Api\FormuleController@getOneWithLang')->where('id', '^[0-9]*$')->where('lang', '^[a-z]{2}$')->name('formule.id.lang');

    // Contact
    Route::post('/contact', 'Api\ContactController@index')->name('contact');
    Route::post('/contact/startup', 'Api\ContactController@startup')->name('contact.startup');
});