<?php

return [
    'default' => env('DB_CONNECTION', 'pgsql'),

    'connections' => [

        'pgsql' => [
            'driver'   => 'pgsql',
            'host'     => env('DB_HOST', 'db'),
            'port'     => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'books'),
            'username' => env('DB_USERNAME', 'bookuser'),
            'password' => env('DB_PASSWORD', 'Book123@'),
            'charset'  => 'utf8',
            'prefix'   => '',
            'schema'   => 'public',
            'sslmode'  => 'prefer',
        ],
    ],

    'migrations' => 'migrations',
];
