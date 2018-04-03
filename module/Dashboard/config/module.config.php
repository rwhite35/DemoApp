<?php
use Dashboard\V1\Rest\RouteGuide\RouteGuideCollection;
use Dashboard\V1\Rest\RouteGuide\RouteGuideEntity;
use Zend\Db\Adapter\AdapterAbstractServiceFactory;

return array(
    'service_manager' => array(
        'factories' => array(
            'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideResource' => 'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideResourceFactory',
            'Db\\Demo' => AdapterAbstractServiceFactory::class,
        ),
        'delegators' => array(
            'Dashboard\\V1\\Rest\\Tasks\\TasksResource\\Table' => array(
                'Dashboard\\TableGatewayFeaturesDelegatorFactory',
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'dashboard.rest.route-guide' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/route-guide[/:route_guide_id]',
                    'defaults' => array(
                        'controller' => 'Dashboard\\V1\\Rest\\RouteGuide\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'dashboard.rest.route-guide',
        ),
    ),
    'zf-rest' => array(
        'Dashboard\\V1\\Rest\\RouteGuide\\Controller' => array(
            'listener' => 'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideResource',
            'route_name' => 'dashboard.rest.route-guide',
            'route_identifier_name' => 'route_guide_id',
            'collection_name' => 'route_guide',
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
            'entity_class' => 'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideEntity',
            'collection_class' => 'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideCollection',
            'service_name' => 'RouteGuide',
        ),
    ),
    // A RESTful database service
    'zf-apigility' => array(
        'db-connected' => array(
            'Dashboard\V1\Rest\Tasks\TasksResource' => array(
                'features' => array(
                    'sequence' => array(
                        'primaryKeyField' => 'oid',
                        'sequenceName' => 'order',
                    ),
                ),
            ),
            'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideResource' => [
                'adapter_name' => 'DB\\Demo',
                'table_name' => 'am_route_guide_order',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'Dashboard\\V1\\Rest\\RouteGuide\\Controller',
                'identifier_name' => 'oid', // optional, field in table to
                'entity_class' => RouteGuideEntity::class,
                'collection_class' => RouteGuideCollection::class,
            ],
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Dashboard\\V1\\Rest\\RouteGuide\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Dashboard\\V1\\Rest\\RouteGuide\\Controller' => array(
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Dashboard\\V1\\Rest\\RouteGuide\\Controller' => array(
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'dashboard.rest.route-guide',
                'route_identifier_name' => 'route_guide_id',
                'hydrator' => 'Zend\\Hydrator\\ObjectProperty',
            ),
            'Dashboard\\V1\\Rest\\RouteGuide\\RouteGuideCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'dashboard.rest.route-guide',
                'route_identifier_name' => 'route_guide_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Dashboard\\V1\\Rest\\RouteGuide\\Controller' => array(
            'input_filter' => 'Dashboard\\V1\\Rest\\RouteGuide\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Dashboard\\V1\\Rest\\Router\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'order_id',
                'description' => 'Ardmore route guide order id.',
                'field_type' => 'number',
                'error_message' => 'Route Guide order id is required and number only.',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'client_id',
                'description' => 'Admore Client ID number',
                'field_type' => 'number',
                'error_message' => 'The Client ID is required its.',
            ),
        ),
        'Dashboard\\V1\\Rest\\RouteGuide\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'order_id',
                'description' => 'The Route Guide order id to search for.',
                'field_type' => 'number',
                'error_message' => 'The Order ID is required and should be a number.',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'client_id',
                'description' => 'The Ardmore Logistics internal client id',
                'field_type' => 'number',
                'error_message' => 'The Client ID is issued from Ardmore and it is required.',
            ),
        ),
    ),
);
