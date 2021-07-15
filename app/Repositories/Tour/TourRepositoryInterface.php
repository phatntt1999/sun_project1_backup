<?php

namespace App\Repositories\Tour;

use App\Repositories\RepositoryInterface;

interface TourRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getTour();
}
