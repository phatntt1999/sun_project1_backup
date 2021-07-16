<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get all and paginate
     * @param  int  $paginate
     * @return mixed
     */
    public function getAllAndPaginate($paginate);

    /**
     * Sort and paginate
     * @param  int  $paginate
     * @return mixed
     */
    public function sortAndPaginate($colum, $orderBy, $paginate);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Get user who is loged in
     * @return mixed
     */
    public function getCurrentUser();
}
