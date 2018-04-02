<?php 
/**
 * Login Service properties the module expects to access
 */
namespace Login\V1\Model;

class Login implements LoginInterface
{
    /**
     * The current users id
     * @var int $uid, users.uid ID
     */
    protected $uid;
    
    /**
     * The current users record
     * @var array $user
     */
    protected $user;
    
    /**
     * get the current users id
     * @param int the users id
     */
    public function getUid()
    {
        return $this->uid;
    }
    
    /**
     * set the current users id
     * @return void
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
    
    /**
     * @param array the users record
     */
    public function getUserRecord()
    {
        return $this->user;
    }
    
    /**
     * set the current users record
     * @return void
     */
    public function setUserRecord($user)
    {
        $this->user = $user;
    }
    
    
}

?>