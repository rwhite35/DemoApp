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
     * @param string $user_name the user allowed to login.
     * @return Entity
     */
    public function create($data, $user_name);

    /**
     * @param string $id 
     * @return Entity
     */
    public function fetch($id);

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
