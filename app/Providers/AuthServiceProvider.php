<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Pktharindu\NovaPermissions\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Client' => 'App\Policies\ClientPolicy',
        'App\Models\Expertise' => 'App\Policies\ExpertisePolicy',
        'App\Models\Framework\Value' => 'App\Policies\FrameworkPolicy',
        'App\Models\Framework\Certification' => 'App\Policies\FrameworkPolicy',
        'App\Models\Office' => 'App\Policies\OfficePolicy',
        'App\Models\SocialMedia' => 'App\Policies\SocialMediaPolicy',
        'App\Models\Team' => 'App\Policies\TeamPolicy',
        'App\Models\UseCase' => 'App\Policies\UseCasePolicy',
        'App\Models\Formule' => 'App\Policies\FormulePolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'Pktharindu\NovaPermissions\Role' => 'App\Policies\RolePolicy',
        'OptimistDigital\MenuBuilder\Models\Menu' => 'App\Policies\MenuPolicy',
        'OptimistDigital\NovaPageManager\Models\Page' => 'App\Policies\PagePolicy',
        'OptimistDigital\NovaPageManager\Models\Region' => 'App\Policies\PagePolicy',
        'OptimistDigital\NovaPageManager\ToolServiceProvider' => 'App\Policies\PagePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        foreach (config('nova-permissions.permissions') as $key => $permissions) {
            Gate::define($key, function (User $user) use ($key) {
                if ($this->nobodyHasAccess($key)) {
                    return true;
                }

                return $user->hasPermissionTo($key);
            });
        }
    }
}
