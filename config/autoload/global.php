<?php
/*
 * Configurations with global scope should be added here.
 * Alternatively, each service can have its own config file located in the
 * autoload/ directory. ./config/autoload/<service>.global.php.
 * Note the '.global.php'.  Autoloading will load all *.global.php config files.
 * 
 * demolib (vendor/demolib) a utility library for functionality required throughout 
 * the application. Example, mapping JSON to an Associative array 
 * using DemoLib::ArrayMapper.
 */
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'map' => [],
        ],
    ],
    // add customized functionality here
    'demolib' => [
        'array_mapper_path' => 'data/demolib.php',
    ],
    // a generic database adapter with global scope
    'db' => [
        'driver' => 'Pdo',
        'dsn'    => 'mysql:dbname=demoapp;host=localhost;charset=utf8',
        'driver_options' => [
            1002 => 'SET NAMES \'UTF8\'',
        ],
        'adapters' => [
            'DB\\Clients' => [
                // add adapters here
            ],
        ],
    ]
];
