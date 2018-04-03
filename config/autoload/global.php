<?php
return array(
    'zf-mvc-auth' => array(
        'authentication' => array(
            'map' => array(),
        ),
    ),
    'demolib' => array(
        'array_mapper_path' => 'data/demolib.php',
    ),
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=demoapp;host=localhost;charset=utf8',
        'driver_options' => array(
            1002 => 'SET NAMES \'UTF8\'',
        ),
        'adapters' => array(
            'Db\\Demo' => array(
                // see local for settings
            ),
        ),
    ),
);
