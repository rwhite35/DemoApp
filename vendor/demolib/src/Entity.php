<?php
namespace DemoLib;
/**
 * Define the user client properties an API endpoints should expect passed.
 * These fields combined with the data/demolib array represent the API Request object.
 * 
 * DemoLib is a dependency of Login and it available anywhere it is instantiated.
 * 
 * @return Objects $<entity_name>
 */

class Entity
{
    /**
     * @var string $id, service identification
     */
    public $id;

    /**
     * @var string, response message 
     */
    public $message;

    /**
     * @var int, when service was called
     */
    public $timestamp;

    /**
     * @var string, user client calling the service
     */
    public $user;
}
