<?php 
/**
 * Login Service class which queries the data base
 */
namespace Login\V1\Service;

use Login\V1\Model\Login;

class LoginService implements LoginServiceInterface
{
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
    
    /**
     * @TODO convert to DB Query.
     * {@inheritdoc}
     * @return array all application users
     */
    public function pullAppUsers()
    {
        $allUsers = [];
        
        foreach($this->usersData as $i => $user) {
            $allUsers[] = $this->pullUser($i);
        }
       
        return $allUsers;
    }
    
    /**
     * {@inheritdoc}
     */
    public function pullUser($i)
    {   
        $userRecord = $this->usersData[$i];
        
        $model = new Login();
        $model->setUid($userRecord['uid']);
        $model->setUserRecord($userRecord);
        
        error_log('L63: LoginService user id is ' . $model->getUid());
        error_log('L64: LoginService user name is ' . $model->getUserRecord()['user_name']);
        
        return $model;
    }
    
}

?>