<?php 
/**
 * Login Interface defines which methods the Login Service will be 
 * required to implement.  
 * 
 * This allows new services to reuse the method
 * name but define their own functionality.
 */
namespace Login\V1\Service;

use Login\V1\Model\LoginInterface;

interface LoginServiceInterface
{
    /**
     * should pull all client users from
     * the database table - users
     * @return array PostInterface
     */
    public function pullAppUsers();
    
    /**
     * should pull only one client user from users
     * @param int $uid the users.uid
     * @return array PostInterface
     */
    public function pullUser($uid);
    
}