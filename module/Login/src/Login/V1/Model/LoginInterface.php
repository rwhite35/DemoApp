<?php
/**
*   Login Service getter methods for easy access to user
*   data from inside the Login module.
*/
namespace Login\V1\Model;

interface LoginInterface
{
    /**
     * Getter method to return the client users ID
     * @return int $uid
     */
    public function getUid();
    
    /**
     * Getter method to return the client users record
     * @return array $user
     */
    public function getUserRecord();
}