<?php

namespace App\Repositories\CategoryTour;

use App\Models\CategoryTour;
use App\Repositories\BaseRepository;
use App\Repositories\CatTour\CatTourRepositoryInterface;

class CatTourRepository extends BaseRepository implements CatTourRepositoryInterface
{
    public function __construct(CategoryTour $catTour)
    {
        parent::__construct($catTour);
    }
}
