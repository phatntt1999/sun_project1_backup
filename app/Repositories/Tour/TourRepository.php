<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Repositories\Tour\TourRepositoryInterface;

class TourRepository extends BaseRepository implements TourRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Tour::class;
    }

    public function getTour()
    {
        return $this->model->select('product_name')->take(5)->get();
    }
}
