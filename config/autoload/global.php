<?php
/**
 * Define service keys with global scope here.
 * The keys are available through the ServiceManager
 */
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'map' => [
                'Login\\V1' => 'basic',
            ],
        ],
    ],
    'demolib' => [
        'array_mapper_path' => 'data/demolib.php',
    ]
];
