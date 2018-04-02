<?php
/**
 * Uses the ServiceManager to create an instance of Login Resource (the listener) 
 * and used to the DemoLin mapper to handle the data input/output. 
 * Login service and listener are a fully functioning REST endpoint.
 * 
 * Note that LoginService is under the Login namespace, it can be instantiated
 * without explicitly configuring that service with the ServiceManager.
 */
namespace Login\V1\Rest\Login;

use DemoLib\ArrayMapper;
use Login\V1\Service\LoginService;

class LoginResourceFactory
{
    public function __invoke($services)
    {
        // instantiate additional services here
        return new LoginResource(
            $services->get(LoginService::class),    // LoginService.php
            $services->get(ArrayMapper::class)      // ArrayMapper.php
            
        );
    }
}
