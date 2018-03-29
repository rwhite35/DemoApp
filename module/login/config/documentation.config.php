<?php
return array(
    'login\\V1\\Rest\\Login\\Controller' => array(
        'description' => 'API Client Login.  Client are required to login before accessing the system.',
        'collection' => array(
            'description' => 'Login endpoints for multiple authorization steps.',
            'GET' => array(
                'description' => 'Get returns information about the client logged in.',
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
              "username": "The user name of the API client user.  Each user client would have their own login.",
              "password": "The client users password.  Each client user would have a unique password."
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Post sends the login credentials to the login endpoint.',
                'request' => '{
   "username": "The user name of the API client user.  Each user client would have their own login.",
   "password": "The client users password.  Each client user would have a unique password."
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/login[/:login_id]"
       }
   }
   "username": "The user name of the API client user.  Each user client would have their own login.",
   "password": "The client users password.  Each client user would have a unique password."
}',
            ),
        ),
    ),
);
