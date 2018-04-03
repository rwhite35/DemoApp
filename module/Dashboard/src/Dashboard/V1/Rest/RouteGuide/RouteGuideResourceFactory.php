<?php
/**
 * Route Guide Service
 * manages client users Route Guide interaction
 * 
 * @uses DemoLib ArrayMapper class for mapping JSON to usable array objects.
 */
namespace Dashboard\V1\Rest\RouteGuide;

use DemoLib\ArrayMapper;

class RouteGuideResourceFactory
{
    
    // inject additional services here
    public function __invoke($services)
    {
        return new RouteGuideResource(
            $services->get(ArrayMapper::class),    // ArrayMapper.php
            $services->get('Db\Demo')               //standard Adapter interface
        );
    }
}
