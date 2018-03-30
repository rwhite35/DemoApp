<?php
return array(
    'Login\\V1\\Rest\\Login\\Controller' => array(
        'description' => 'Client user login and authentication',
        'entity' => array(
            'description' => 'Endpoints used to authenticate a user',
            'GET' => array(
                'description' => 'Retrieve the authentication/login status',
                'response' => '{
   "_links": {
       "self": {
           "href": "/login[/:login_id]"
       }
   }
   "user": "Client user name to authenticate",
   "password": "Client user password stored in user record",
   "timestamp": "Hidden field captures the login timestamp."
}',
            ),
        ),
        'collection' => array(
            'description' => 'Endpoints used to acquire tokens including JWT or OAuth2 tokens',
            'GET' => array(
                'description' => 'Retrieves the token from the backend',
                'response' => '{
   "_links": {
       "self": {
           "href": "/login"
       },
       "first": {
           "href": "/login?page={page}"
       },
       "prev": {
           "href": "/login?page={page}"
       },
       "next": {
           "href": "/login?page={page}"
       },
       "last": {
           "href": "/login?page={page}"
       }
   }
   "_embedded": {
       "login": [
           {
               "_links": {
                   "self": {
                       "href": "/login[/:login_id]"
                   }
               }
              "user": "Client user name to authenticate",
              "password": "Client user password stored in user record",
              "timestamp": "Hidden field captures the login timestamp."
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Creates a new record in the db with the users timestamp.',
                'request' => '{
   "user": "Client user name to authenticate",
   "password": "Client user password stored in user record",
   "timestamp": "Hidden field captures the login timestamp."
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/login[/:login_id]"
       }
   }
   "user": "Client user name to authenticate",
   "password": "Client user password stored in user record",
   "timestamp": "Hidden field captures the login timestamp."
}',
            ),
        ),
    ),
);
