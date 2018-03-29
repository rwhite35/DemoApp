<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * 
 * To run the Apigility server as a separate service, start the service is a different port
 * than httpd (or ng) is running on.  From the root directory run the following command
 * php -S 0.0.0.0:8080 -ddisplay_errors=0 -t public public/index.php
 * 
 */

namespace Application;

use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
                
}
