<?php

namespace App\Repositories\Rating;

use App\Models\Rating;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Repositories\BaseRepository;

class RatingRepository extends BaseRepository implements RatingRepositoryInterface
{
    public function __construct(Rating $rating)
    {
        parent::__construct($rating);
    }
}
