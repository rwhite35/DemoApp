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
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->mapper->fetch($id);
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
        // get the last record.
        $tbl = "am_route_guide_order";
        $table = new TableGateway($tbl, $this->db);
        $rowset = $table->select();
        $lastRowObj   = $rowset->current();
        $oid = $lastRowObj['oid'];
        // print_r($lastRowObj);
        error_log('RouteGuideResource last row ' . $oid);
        
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
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
