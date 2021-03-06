<?php

namespace Tests\Unit\Models;

use App\Models\CategoryTour;
use App\Models\Tour;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TourModelTest extends TestCase
{
    use RefreshDatabase;

    protected $category_tour;
    protected $tour;

    public function setUp(): void
    {
        parent::setUp();
        $this->category_tour = CategoryTour::factory()->create();
        $this->tour = Tour::factory()->create(['cat_tour_id' => $this->category_tour->id]);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            'name',
            'description',
            'duration',
            'num_of_participants',
            'cat_tour_id',
            'avgRate',
            'price',
        ], $this->tour->getFillable());
    }

    public function test_tour_belong_to_category_tour()
    {
        $this->assertInstanceOf(BelongsTo::class, $this->tour->CategoryTour());
        $this->assertEquals('cat_tour_id', $this->tour->CategoryTour()->getForeignKeyName());
    }

    public function test_tour_has_many_tours()
    {
        $this->assertInstanceOf(HasMany::class, $this->tour->ratings());
        $this->assertEquals('tour_id', $this->tour->ratings()->getForeignKeyName());
    }

    public function test_data_insert_by_using_eloquent()
    {
        $this->assertEquals($this->tour->id, $this->tour->CategoryTour->id, 'data not match');
    }
}
