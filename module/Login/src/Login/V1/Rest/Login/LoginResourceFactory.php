<?php
/**
 * Inject additional services here through the Invokables object
 * 
 * Uses the ServiceManager to create instances of Login Resource (the listener) 
 * and calls other services.
 * 
 * LoginService Service is under the Login namespace, its configured as an invokable
 * under Login/config/module.config.php ServiceManager key.
 * 
 * ArrayMapper is Utility defined under the DemoApp Library (vendor/demolib).
 * Its assigned to ServiceManager in vendor/demolib/config/module.config.php 
 * Service Manager key.
 */
namespace Login\V1\Rest\Login;

use DemoLib\ArrayMapper;
use Login\V1\Service\LoginService;

class LoginResourceFactory
{
    public function __invoke($services)
    {
        // inject additional services here
        return new LoginResource(
            $services->get(LoginService::class),    // LoginService.php
            $services->get(ArrayMapper::class)      // ArrayMapper.php
            
        );
    }
}
