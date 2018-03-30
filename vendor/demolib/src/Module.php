<?php
namespace DemoLib;
/**
 * Required for autoloading
 * 
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * 
 * @return Array getConfig, appends to application configurations
 */

class Module
{
    /**
     * @return array modules configurations
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
