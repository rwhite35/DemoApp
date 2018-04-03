<?php
/**
 * DemoLib Interface defines what actions a given Entity or Collection will handle.
 */
namespace DemoLib;
/**
 * Interface for nasalib sub classes must implement each method
 * 
 */
interface MapperInterface
{
    /**
     * @param array|\Traversable|\stdClass $data 
     * @param string (optional)$user_name the user allowed to login.
     * @return Entity
     */
    public function create($data, $userName = null);

    /**
     * @param string $id, the client users XID
     * @param int (optional)$orderId the Route Guide order id
     * @return Entity
     */
    public function fetch($id, $orderId = null);

    /**
     * @return Collection
     */
    public function fetchAll();

    /**
     * @param string $id 
     * @param array|\Traversable|\stdClass $data 
     * @return Entity
     */
    public function update($id, $data);

    /**
     * @param string $id 
     * @return bool
     */
    public function delete($id);
}
