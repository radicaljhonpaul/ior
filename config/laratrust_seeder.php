<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadministrator' => [
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',
            'companies' => 'c,r,u,d',
        ],
        'administrator' => [
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'permissions' => 'r',
            'companies' => 'c,r,u,d',
        ],
        'employee' => [
            'companies' => 'c,r,u,d',
            'users' => 'r',
        ],
        'primary_client' => [
            'companies' => 'r,u',
            'users' => 'r',
        ],
        'secondary_client' => [
            'companies' => 'r',
            'users' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
