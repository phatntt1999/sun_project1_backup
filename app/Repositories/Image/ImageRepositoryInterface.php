<?php

namespace App\Repositories\Image;

use \App\Repositories\RepositoryInterface;

interface ImageRepositoryInterface extends RepositoryInterface
{
    public function deleteImage($images);
}
