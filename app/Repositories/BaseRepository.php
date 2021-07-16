<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model::All();
    }

    public function getAllAndPaginate($paginate)
    {
        return $this->model->paginate($paginate);
    }

    public function sortAndPaginate($colum, $orderBy, $paginate)
    {
        try {
            if (!(empty($colum))  && !(empty($orderBy) && !(empty($paginate)))) {
                return $this->model->orderBy($colum, $orderBy)->paginate($paginate);
            }
        } catch (\Throwable $e) {
            throw new \Exception('Query is null');
        }
    }

    public function find($id)
    {
        try {
            $result = $this->model->find($id);
        } catch (ModelNotFoundException $exception) {
            Log::debug("Id not found");

            return false;
        }
        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }
}
