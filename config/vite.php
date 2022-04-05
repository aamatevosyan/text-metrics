<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Configurations
    |--------------------------------------------------------------------------
    | The following describes a set of configurations that can be used
    | independently. Because Vite does not support generating multiple
    | bundles, using separate configuration files is necessary.
    | https://laravel-vite.dev/configuration/laravel-package.html#configs
    */
    'configs' => [
        'front' => [
            'entrypoints' => [
                'paths' => [
                    'resources/themes/front/scripts/app.js',
                ],
                'ignore' => '/\\.(d\\.ts|json)$/',
            ],
            'dev_server' => [
                'enabled' => true,
                'url' => env('DEV_SERVER_URL', 'http://0.0.0.0:3001'),
                'ping_before_using_manifest' => true,
                'ping_url' => null,
                'ping_timeout' => 1,
                'key' => env('DEV_SERVER_KEY'),
                'cert' => env('DEV_SERVER_CERT'),
            ],
            'build_path' => 'build/front',
        ],
        'supervisor' => [
            'entrypoints' => [
                'paths' => [
                    'resources/themes/supervisor/scripts/app.js',
                ],
                'ignore' => '/\\.(d\\.ts|json)$/',
            ],
            'dev_server' => [
                'enabled' => true,
                'url' => env('DEV_SERVER_URL', 'http://0.0.0.0:3002'),
                'ping_before_using_manifest' => true,
                'ping_url' => null,
                'ping_timeout' => 1,
                'key' => env('DEV_SERVER_KEY'),
                'cert' => env('DEV_SERVER_CERT'),
            ],
            'build_path' => 'build/supervisor',
        ],
        'admin' => [
            'entrypoints' => [
                'paths' => [
                    'resources/themes/admin/scripts/app.js',
                ],
                'ignore' => '/\\.(d\\.ts|json)$/',
            ],
            'dev_server' => [
                'enabled' => true,
                'url' => env('DEV_SERVER_URL', 'http://0.0.0.0:3003'),
                'ping_before_using_manifest' => true,
                'ping_url' => null,
                'ping_timeout' => 1,
                'key' => env('DEV_SERVER_KEY'),
                'cert' => env('DEV_SERVER_CERT'),
            ],
            'build_path' => 'build/admin',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Aliases
    |--------------------------------------------------------------------------
    | You can define aliases to avoid having to make relative imports.
    | Aliases will be written to tsconfig.json automatically so your IDE
    | can know how to resolve them.
    | https://laravel-vite.dev/configuration/laravel-package.html#aliases
    */
    'aliases' => [
        '@root' => './',
        '@resources' => 'resources',
        '@' => 'resources/scripts',
        '@admin' => 'resources/themes/admin/scripts',
        '@supervisor' => 'resources/themes/supervisor/scripts',
        '@front' => 'resources/themes/front/scripts',
    ],

    /*
    |--------------------------------------------------------------------------
    | Commands
    |--------------------------------------------------------------------------
    | Before starting the development server or building the assets, you
    | may need to run specific commands. With these options, you can
    | define what to run, automatically.
    | https://laravel-vite.dev/configuration/laravel-package.html#commands
    */
    'commands' => [
        'artisan' => [
            'vite:tsconfig',
            // 'typescript:generate'
        ],
        'shell' => [
            //
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Testing
    |--------------------------------------------------------------------------
    | Depending on the way you are testing your application,
    | you may or may not need to use the manifest. This option controls
    | the manifest should be used in the "testing" environment.
    | https://laravel-vite.dev/configuration/laravel-package.html#testing
    */
    'testing' => [
        'use_manifest' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Environment variable prefixes
    |--------------------------------------------------------------------------
    | This option defines the prefixes that environment variables must
    | have in order to be accessible from the front-end.
    | https://laravel-vite.dev/configuration/laravel-package.html#env_prefixes
    */
    'env_prefixes' => ['VITE_', 'MIX_', 'SCRIPT_'],

    /*
    |--------------------------------------------------------------------------
    | Default interfaces
    |--------------------------------------------------------------------------
    | Here you may change how some parts of the package work by replacing
    | their associated logic.
    | https://laravel-vite.dev/configuration/laravel-package.html#interfaces
    */
    'interfaces' => [
        'heartbeat_checker' => Innocenzi\Vite\HeartbeatCheckers\HttpHeartbeatChecker::class,
        'tag_generator' => Innocenzi\Vite\TagGenerators\CallbackTagGenerator::class,
        'entrypoints_finder' => Innocenzi\Vite\EntrypointsFinder\DefaultEntrypointsFinder::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default configuration
    |--------------------------------------------------------------------------
    | Here you may specify which of the configurations above you wish
    | to use as your default one.
    | https://laravel-vite.dev/configuration/laravel-package.html#default
    */
    'default' => env('VITE_DEFAULT_CONFIG', 'front'),
];
