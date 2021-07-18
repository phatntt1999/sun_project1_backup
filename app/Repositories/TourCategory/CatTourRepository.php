<?php

namespace App\Repositories\TourCategory;

use App\Models\CategoryTour;
use App\Repositories\BaseRepository;
use App\Repositories\TourCategory\CatTourRepositoryInterface;

class CatTourRepository extends BaseRepository implements CatTourRepositoryInterface
{
    public function __construct(CategoryTour $catTour)
    {
        parent::__construct($catTour);
    }
}
