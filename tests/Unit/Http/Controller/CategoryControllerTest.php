<?php

namespace Tests\Unit\Http\Controller;

use App\Http\Controllers\CategoryController;
use App\Models\CategoryTour;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Mockery;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $category;
    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Faker::create();
        $this->categories = [
            'name' => $this->faker->name,
        ];
        $this->categoryTour = new CategoryController();
        $this->retrieveCategory = new CategoryTour();
    }

    public function test_store_of_category_controller_return_redirect()
    {
        $request = new Request($this->categories);

        // Gọi hàm tạo
        $category = $this->categoryTour->store($request);

        dd($this->retrieveCategory);
        // Kiểm tra xem kết quả trả về có là thể hiện của lớp Category hay không
        //$this->assertInstanceOf(CategoryTour::class, $category);

        // Kiểm tra data trả về
        $this->assertEquals($this->categories['name'], $this->retrieveCategory->cat_name);

        // Kiểm tra dữ liệu có tồn tại trong cơ sở dữ liệu hay không
        //$this->assertDatabaseHas('categories', $this->categories);
    }

    // public function test_index_of_category_controller_return_view()
    // {
    //     $catTour = Mockery::mock(CategoryTour::class);

    //     $controller = new CategoryController($catTour);

    //     $request = new Request();
    //     $view = $controller->index($request);
    //     $this->assertEquals('admin.listCategory', $view->name());
    // }
}
