<?php
/**
 * LoginResouce Object listens for API calls and inherits its 
 * functionality from DemoLib (vedor/demolib) which defines each method body.
 */
namespace Login\V1\Rest\Login;

use DemoLib\MapperInterface;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class LoginResource extends AbstractResourceListener
{
    /**
     * Class property mapper
     * holds the input/ouput data for API calls.
     */
    protected $mapper;
    
    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }
    
    /**
     * Create (POST) a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return $this->mapper->create($data);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return $this->mapper->delete($id);
        // return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->mapper->fetch($id);
        // return new ApiProblem(405, 'The GET method has not been defined for individual resources');
    }

    /**
     * Fetch all or a subset of Login resources endpoint info
     * This return the configurations for the resources endpoint
     * collection
     *
     * @param  array $params, the Mapper interface doesnt specific any parameters.
     * however, the outside could pass in params and some logic could handle the
     * input.  Perhaps a validation intercept..
     * 
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        ob_start();
        var_dump($params);
        $str = ob_end_clean();
        error_log("LoginResource params array $str");
        
        return $this->mapper->fetchAll();
        // return new ApiProblem(405, 'The GET method has not been defined for collections');
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
     * Update (PUT) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return $this->mapper->update($id, $data);
        // return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
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
    
}
