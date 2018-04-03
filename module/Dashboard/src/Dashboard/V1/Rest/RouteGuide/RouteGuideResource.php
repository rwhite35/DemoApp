<?php
/**
 * Route Guide resource defines how to handle the incoming request, how to process in the
 * input and what to do next.  This is the API resource that orchestrates the backend.
 * 
 * @see https://docs.zendframework.com/tutorials/db-adapter/ For DB Adapter setup
 */
namespace Dashboard\V1\Rest\RouteGuide;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

// Additional backend services
use DemoLib\MapperInterface;     // defines how the resouce handles input data.
use Zend\Db\Adapter\Adapter;     // instance of db adapter, inject in service factory
use Zend\Db\TableGateway\TableGateway;

class RouteGuideResource extends AbstractResourceListener
{
    /**
     * Class property mapper
     * mapps the input/ouput data for API calls.
     * @param MapperInterface $mapper
     */
    protected $mapper;
    protected $db;
    
    public function __construct(
        MapperInterface $mapper,
        Adapter $db
    ) {
        $this->mapper = $mapper;
        $this->db = $db;
    }

    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch an Route Guide by Order ID
     * 
     * @uses object TableGateway($DB_Table, Db\Adapter_Obj)
     *
     * @param  mixed $id,  client users XID 
     * @return ApiProblem|mixed
     */
    public function fetch($id, $orderId=1122272)
    {
        //query database here for simple operations
        $tbl = "am_route_guide_order";
        $queue = new TableGateway($tbl, $this->db);
        $rowset = $queue->select('order_id', $orderId); // select(<where>, <equals>)
        $lastRowObj   = $rowset->current();
        $oid = $lastRowObj['oid'];
        error_log('RouteGuideResource fetch with order id  ' . 
            $orderId . ' returned oid ' . $oid);
        
        // format resultSet for update
        $data = [
            'oid' => $oid,
            'order_id' => $orderId
        ];
        
        // instantiates mapper object and append data to entity
        $this->mapper = $this->update($id, $data);
        
        return $this->mapper;
    }

    /**
     * Fetch all or a subset of resources.
     * Optionally, we can pass in an array of properties the 
     * fetchAll should only return.  
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {   
        return $this->mapper->fetchAll();  
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id the client users xid
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return $this->mapper->update($id, $data);
        // return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
