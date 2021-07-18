<?php

namespace App\Repositories\Image;

use App\Models\Image;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\BaseRepository;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    public function __construct(Image $image)
    {
        parent::__construct($image);
    }

    public function deleteImage($images)
    {
        foreach ($images as $image) {
            return $image->delete();
        }
        return false;
    }
}
