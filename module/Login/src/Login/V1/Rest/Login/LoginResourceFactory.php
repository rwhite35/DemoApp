<?php
/**
 * Uses the ServiceManager to create an instance of Login Resource (the listener) 
 * and used to the DemoLin mapper to handle the data input/output. 
 * Login service and listener are a fully functioning REST endpoint.
 */
namespace Login\V1\Rest\Login;

use DemoLib\ArrayMapper;

class LoginResourceFactory
{
    public function __invoke($services)
    {
        // was Mapper::class before
        return new LoginResource($services->get(ArrayMapper::class));
    }
}
