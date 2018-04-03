<?php
return array(
    'Dashboard\\V1\\Rest\\RouteGuide\\Controller' => array(
        'description' => 'Route Guide Information for a clients users route guides.',
        'collection' => array(
            'description' => 'Displays Route Guide information only.',
            'GET' => array(
                'description' => 'Fetch a Route Guide order by its order id',
                'response' => '{
   "_links": {
       "self": {
           "href": "/route-guide"
       },
       "first": {
           "href": "/route-guide?page={page}"
       },
       "prev": {
           "href": "/route-guide?page={page}"
       },
       "next": {
           "href": "/route-guide?page={page}"
       },
       "last": {
           "href": "/route-guide?page={page}"
       }
   }
   "_embedded": {
       "route_guide": [
           {
               "_links": {
                   "self": {
                       "href": "/route-guide[/:route_guide_id]"
                   }
               }
              "order_id": "The Route Guide order id to search for.",
              "client_id": "The Ardmore Logistics internal client id"
           }
       ]
   }
}',
            ),
            'POST' => array(
                'description' => 'Modify information in the current route guide',
                'request' => '{
   "order_id": "The Route Guide order id to search for.",
   "client_id": "The Ardmore Logistics internal client id"
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/route-guide[/:route_guide_id]"
       }
   }
   "order_id": "The Route Guide order id to search for.",
   "client_id": "The Ardmore Logistics internal client id"
}',
            ),
        ),
    ),
);
