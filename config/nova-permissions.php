<?php

return [
    /*
    |--------------------------------------------------------------------------
    | User model class
    |--------------------------------------------------------------------------
    */

    'user_model' => 'App\User',

    /*
    |--------------------------------------------------------------------------
    | Nova User resource tool class
    |--------------------------------------------------------------------------
    */

    'user_resource' => 'App\Nova\User',

    /*
    |--------------------------------------------------------------------------
    | The group associated with the resource
    |--------------------------------------------------------------------------
    */

    'role_resource_group' => 'Other',

    /*
    |--------------------------------------------------------------------------
    | Database table names
    |--------------------------------------------------------------------------
    | When using the "HasRoles" trait from this package, we need to know which
    | table should be used to retrieve your roles. We have chosen a basic
    | default value but you may easily change it to any table you like.
    */

    'table_names' => [
        'roles' => 'roles',

        'role_permission' => 'role_permission',

        'role_user' => 'role_user',
        
        'users' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Permissions
    |--------------------------------------------------------------------------
    */

    'permissions' => [

        'view clients' => [
            'display_name' => 'View clients',
            'description'  => 'Can view clients',
            'group'        => 'Client',
        ],
        'create clients' => [
            'display_name' => 'Create clients',
            'description'  => 'Can create clients',
            'group'        => 'Client',
        ],
        'update clients' => [
            'display_name' => 'Update clients',
            'description'  => 'Can update clients',
            'group'        => 'Client',
        ],
        'delete clients' => [
            'display_name' => 'Delete clients',
            'description'  => 'Can delete clients',
            'group'        => 'Client',
        ],

        'view expertises' => [
            'display_name' => 'View expertises',
            'description'  => 'Can view expertises',
            'group'        => 'Expertise',
        ],
        'create expertises' => [
            'display_name' => 'Create expertises',
            'description'  => 'Can create expertises',
            'group'        => 'Expertise',
        ],
        'update expertises' => [
            'display_name' => 'Update expertises',
            'description'  => 'Can update expertises',
            'group'        => 'Expertise',
        ],
        'delete expertises' => [
            'display_name' => 'Delete expertises',
            'description'  => 'Can delete expertises',
            'group'        => 'Expertise',
        ],

        'view formules' => [
            'display_name' => 'View formules',
            'description'  => 'Can view formules',
            'group'        => 'Formule',
        ],
        'create formules' => [
            'display_name' => 'Create formules',
            'description'  => 'Can create formules',
            'group'        => 'Formule',
        ],
        'update formules' => [
            'display_name' => 'Update formules',
            'description'  => 'Can update formules',
            'group'        => 'Formule',
        ],
        'delete formules' => [
            'display_name' => 'Delete formules',
            'description'  => 'Can delete formules',
            'group'        => 'Formule',
        ],

        'view frameworks' => [
            'display_name' => 'View frameworks',
            'description'  => 'Can view frameworks',
            'group'        => 'Framework',
        ],
        'create frameworks' => [
            'display_name' => 'Create frameworks',
            'description'  => 'Can create frameworks',
            'group'        => 'Framework',
        ],
        'update frameworks' => [
            'display_name' => 'Update frameworks',
            'description'  => 'Can update frameworks',
            'group'        => 'Framework',
        ],
        'delete frameworks' => [
            'display_name' => 'Delete frameworks',
            'description'  => 'Can delete frameworks',
            'group'        => 'Framework',
        ],

        'view menus' => [
            'display_name' => 'View menus',
            'description'  => 'Can view menus',
            'group'        => 'Menu',
        ],
        'create menus' => [
            'display_name' => 'Create menus',
            'description'  => 'Can create menus',
            'group'        => 'Menu',
        ],
        'update menus' => [
            'display_name' => 'Update menus',
            'description'  => 'Can update menus',
            'group'        => 'Menu',
        ],
        'delete menus' => [
            'display_name' => 'Delete menus',
            'description'  => 'Can delete menus',
            'group'        => 'Menu',
        ],

        'view pages' => [
            'display_name' => 'View pages',
            'description'  => 'Can view pages',
            'group'        => 'Page',
        ],
        'create pages' => [
            'display_name' => 'Create pages',
            'description'  => 'Can create pages',
            'group'        => 'Page',
        ],
        'update pages' => [
            'display_name' => 'Update pages',
            'description'  => 'Can update pages',
            'group'        => 'Page',
        ],
        'delete pages' => [
            'display_name' => 'Delete pages',
            'description'  => 'Can delete pages',
            'group'        => 'Page',
        ],
        
        'view offices' => [
            'display_name' => 'View offices',
            'description'  => 'Can view offices',
            'group'        => 'Office',
        ],
        'create offices' => [
            'display_name' => 'Create offices',
            'description'  => 'Can create offices',
            'group'        => 'Office',
        ],
        'update offices' => [
            'display_name' => 'Update offices',
            'description'  => 'Can update offices',
            'group'        => 'Office',
        ],
        'delete offices' => [
            'display_name' => 'Delete offices',
            'description'  => 'Can delete offices',
            'group'        => 'Office',
        ],

        'view social media' => [
            'display_name' => 'View social media',
            'description'  => 'Can view social media',
            'group'        => 'Social Media',
        ],
        'create social media' => [
            'display_name' => 'Create social media',
            'description'  => 'Can create social media',
            'group'        => 'Social Media',
        ],
        'update social media' => [
            'display_name' => 'Update social media',
            'description'  => 'Can update social media',
            'group'        => 'Social Media',
        ],
        'delete social media' => [
            'display_name' => 'Delete social media',
            'description'  => 'Can delete social media',
            'group'        => 'Social Media',
        ],

        'view teams' => [
            'display_name' => 'View teams',
            'description'  => 'Can view teams',
            'group'        => 'Team',
        ],
        'create teams' => [
            'display_name' => 'Create teams',
            'description'  => 'Can create teams',
            'group'        => 'Team',
        ],
        'update teams' => [
            'display_name' => 'Update teams',
            'description'  => 'Can update teams',
            'group'        => 'Team',
        ],
        'delete teams' => [
            'display_name' => 'Delete teams',
            'description'  => 'Can delete teams',
            'group'        => 'Team',
        ],

        'view use cases' => [
            'display_name' => 'View use cases',
            'description'  => 'Can view use cases',
            'group'        => 'Use Case',
        ],
        'create use cases' => [
            'display_name' => 'Create use cases',
            'description'  => 'Can create use cases',
            'group'        => 'Use Case',
        ],
        'update use cases' => [
            'display_name' => 'Update use cases',
            'description'  => 'Can update use cases',
            'group'        => 'Use Case',
        ],
        'delete use cases' => [
            'display_name' => 'Delete use cases',
            'description'  => 'Can delete use cases',
            'group'        => 'Use Case',
        ],

        'view users' => [
            'display_name' => 'View users',
            'description'  => 'Can view users',
            'group'        => 'User',
        ],

        'create users' => [
            'display_name' => 'Create users',
            'description'  => 'Can create users',
            'group'        => 'User',
        ],

        'update users' => [
            'display_name' => 'Edit users',
            'description'  => 'Can update users',
            'group'        => 'User',
        ],

        'delete users' => [
            'display_name' => 'Delete users',
            'description'  => 'Can delete users',
            'group'        => 'User',
        ],

        'view roles' => [
            'display_name' => 'View roles',
            'description'  => 'Can view roles',
            'group'        => 'Role',
        ],

        'create roles' => [
            'display_name' => 'Create roles',
            'description'  => 'Can create roles',
            'group'        => 'Role',
        ],

        'update roles' => [
            'display_name' => 'Edit roles',
            'description'  => 'Can update roles',
            'group'        => 'Role',
        ],

        'delete roles' => [
            'display_name' => 'Delete roles',
            'description'  => 'Can delete roles',
            'group'        => 'Role',
        ],
    ],
];
