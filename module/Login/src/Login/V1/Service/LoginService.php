<?php 
/**
 * Login Service class which queries the data base
 */
namespace Login\V1\Service;

use Login\V1\Model\Login;

class LoginService implements LoginServiceInterface
{
    /**
     * Login Model object
     */
    protected $Model;
    
    /**
     * All users records in the database
     * this will be replaces with a db query.
     */
    protected $usersData = [
        [
            'uid'           => 123,
            'user_name'     => 'The Joker',
            'user_pwd'      => 'prank',
            'user_active'   =>  1
        ],
        [
            'uid'           => 234,
            'user_name'     => 'Two Face',
            'user_pwd'      => 'double',
            'user_active'   =>  1
        ],
        [
            'uid'           => 345,
            'user_name'     => 'The Penquin',
            'user_pwd'      => 'walk',
            'user_active'   =>  0
        ]
    ];
    
    public function __construct() {
        $this->Model = new Login;
    }
    
    /**
     * @TODO convert to DB Query.
     * Loops over each client user and sets them to the Login object
     * {@inheritdoc}
     * @return object Login clients
     */
    public function pullClientUsers()
    {
        $allUsers = [];
        $count = 0;
        foreach($this->usersData as $i => $user) {
            $count++;
            $allUsers[] = $this->pullClientUser($i);
        }
        
        // return $allUsers;
        return $count;
    }
    
    /**
     * Sets a users record by index id
     * {@inheritdoc}
     */
    public function pullClientUser($i)
    {   
        $userRecord = $this->usersData[$i];
        
        $this->Model->setUid($userRecord['uid']);
        $this->Model->setUserRecord($userRecord);
        
        // error_log('L63: LoginService user id is ' . $this->Model->getUid());
        // error_log('L64: LoginService user name is ' . $this->Model->getUserRecord()['user_name']);
        
        return $this->Model;
    }

}
