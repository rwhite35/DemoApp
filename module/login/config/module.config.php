<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'login\\V1\\Rest\\Login\\LoginResource' => 'login\\V1\\Rest\\Login\\LoginResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'login.rest.login' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/login[/:login_id]',
                    'defaults' => array(
                        'controller' => 'login\\V1\\Rest\\Login\\Controller',
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
        'login\\V1\\Rest\\Login\\Controller' => array(
            'listener' => 'login\\V1\\Rest\\Login\\LoginResource',
            'route_name' => 'login.rest.login',
            'route_identifier_name' => 'login_id',
            'collection_name' => 'login',
            'entity_http_methods' => array(
                0 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'login\\V1\\Rest\\Login\\LoginEntity',
            'collection_class' => 'login\\V1\\Rest\\Login\\LoginCollection',
            'service_name' => 'login',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'login\\V1\\Rest\\Login\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'login\\V1\\Rest\\Login\\Controller' => array(
                0 => 'application/vnd.login.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'login\\V1\\Rest\\Login\\Controller' => array(
                0 => 'application/vnd.login.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'login\\V1\\Rest\\Login\\LoginEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'login.rest.login',
                'route_identifier_name' => 'login_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'login\\V1\\Rest\\Login\\LoginCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'login.rest.login',
                'route_identifier_name' => 'login_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'login\\V1\\Rest\\Login\\Controller' => array(
            'input_filter' => 'login\\V1\\Rest\\Login\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'login\\V1\\Rest\\Login\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'username',
                'description' => 'The user name of the API client user.  Each user client would have their own login.',
                'field_type' => 'text',
                'error_message' => 'User name is a required field!',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'password',
                'description' => 'The client users password.  Each client user would have a unique password.',
                'field_type' => 'password',
                'error_message' => 'Password is a required field!',
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'login\\V1\\Rest\\Login\\Controller' => array(
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
