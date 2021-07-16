<?php

namespace App\Repositories\Tour;

use App\Models\Tour;
use App\Repositories\BaseRepository;
use App\Repositories\Tour\TourRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TourRepository extends BaseRepository implements TourRepositoryInterface
{
    public function __construct(Tour $tour)
    {
        parent::__construct($tour);
    }

    public function search($destination, $duration)
    {
        $tours = $this->model::with('images')->where('name', 'LIKE', '%' . $destination . '%')
            ->where('duration', 'LIKE', '%' . $duration . '%')
            ->paginate(config('app.default_paginate_tour'));
        return $tours;
    }
}
