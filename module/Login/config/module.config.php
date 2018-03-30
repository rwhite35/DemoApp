<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Login\\V1\\Rest\\Login\\LoginResource' => 'Login\\V1\\Rest\\Login\\LoginResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'login.rest.login' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/login[/:login_id]',
                    'defaults' => array(
                        'controller' => 'Login\\V1\\Rest\\Login\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'login.rest.login',
        ),
    ),
    'zf-rest' => array(
        'Login\\V1\\Rest\\Login\\Controller' => array(
            'listener' => 'Login\\V1\\Rest\\Login\\LoginResource',
            'route_name' => 'login.rest.login',
            'route_identifier_name' => 'login_id',
            'collection_name' => 'login',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Login\\V1\\Rest\\Login\\LoginEntity',
            'collection_class' => 'Login\\V1\\Rest\\Login\\LoginCollection',
            'service_name' => 'Login',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Login\\V1\\Rest\\Login\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Login\\V1\\Rest\\Login\\Controller' => array(
                0 => 'application/vnd.login.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Login\\V1\\Rest\\Login\\Controller' => array(
                0 => 'application/vnd.login.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Login\\V1\\Rest\\Login\\LoginEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'login.rest.login',
                'route_identifier_name' => 'login_id',
                'hydrator' => 'Zend\\Hydrator\\ObjectProperty',
            ),
            'Login\\V1\\Rest\\Login\\LoginCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'login.rest.login',
                'route_identifier_name' => 'login_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Login\\V1\\Rest\\Login\\Controller' => array(
            'input_filter' => 'Login\\V1\\Rest\\Login\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Login\\V1\\Rest\\Login\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(),
                    ),
                ),
                'filters' => array(),
                'name' => 'user',
                'description' => 'Client user name to authenticate',
                'error_message' => 'User name is a required field!',
                'field_type' => 'text',
            ),
            1 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(),
                    ),
                ),
                'filters' => array(),
                'name' => 'password',
                'description' => 'Client user password stored in user record',
                'error_message' => 'Password is a required field!',
                'field_type' => 'text',
            ),
            2 => array(
                'required' => false,
                'validators' => array(),
                'filters' => array(),
                'name' => 'timestamp',
                'description' => 'Hidden field captures the login timestamp.',
                'allow_empty' => false,
                'field_type' => 'int',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Login\\V1\\Rest\\Login\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
