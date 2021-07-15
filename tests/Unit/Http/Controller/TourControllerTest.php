<?php

namespace Tests\Unit\Http\Controller;

use App\Http\Controllers\TourController;
use App\Models\CategoryTour;
use App\Models\Tour;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class TourControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $CatTour;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_index_return_view()
    {
        $this->CatTour = Mockery::mock(Tour::class);
        dd($this->CatTour);
        $controller = new TourController($this->CatTour);
        $request = new Request();

        $view = $controller->index($request);
        $this->assertEquals('destinations', $view->name());
    }

    public function test_show_tour_return_view_detail()
    {
        //
    }
}
