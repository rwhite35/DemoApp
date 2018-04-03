<?php
/**
 * LoginResouce Object listens for API calls for Entities and Collections.
 * It inherits some functionality from DemoLib (vedor/demolib) which maps JSON to usable 
 * array objects but defines its own database interaction through the Login Service Interface.
 */
namespace Login\V1\Rest\Login;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

// Additional backed services 
use DemoLib\MapperInterface;
use Login\V1\Service\LoginServiceInterface;

class LoginResource extends AbstractResourceListener
{
    /**
     * @var LoginServiceInterface
     */
    protected $loginService;
    
    /**
     * Class property mapper
     * maps the input/ouput data for API calls.
     */
    protected $mapper;
    
    public function __construct(
        LoginServiceInterface $loginService,
        MapperInterface $mapper
    ) {
        $this->loginService = $loginService;
        $this->mapper = $mapper;
    }
    
    /**
     * Create (POST) a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed, 401 is error code passed back to frontend. True is success.
     */
    public function create($data)
    {
        // Get Client Users to authenticate against, only The Penquin is allowed (for demo)
        $cnt = $this->loginService->pullClientUsers(); // return number of client users to check
        $cnt--;
        $uid = $this->loginService->pullClientUser($cnt)->getUid();
        $user_name = $this->loginService->pullClientUser($cnt)->getUserRecord()['user_name'];
        // error_log('LoginResource LoginService->getUid value ' . $uid . ' of count ' . $cnt);
        error_log('LoginResource LoginService->getUserRecord name value ' . $user_name . ' of count ' . $cnt);
        
        return $this->mapper->create($data, $user_name);
        
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
     * This return the configurations for the resources endpoint collection
     *
     * @param  array $params, the Mapper interface doesnt specific any parameters.
     * however, the outside could pass in params and some logic could handle the
     * input.  Perhaps a validation intercept..
     * 
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
     * Update (PUT) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        // return $this->mapper->update($id, $data);
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
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
