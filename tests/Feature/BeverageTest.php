<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Beverage;

class BeverageTest extends TestCase
{
    use RefreshDatabase;

    private $beverage;

    // void を指定しないとエラーになる
    public function setup(): void
    {
        parent::setup();

        $this->beverage = Beverage::factory()->create();
    }


    public function test_a_user_can_visit_a_beverage_page_and_see_beverages()
    {
        $response = $this->get('/beverage');

        $response->assertSee($this->beverage->name);

        $response->assertStatus(200);
    }

    public function test_a_user_can_visit_a_single_beverage_page()
    {
        $response = $this->get('/beverage/'.$this->beverage->id);

        $response->assertSee($this->beverage->name);

        $response->assertStatus(200);
    }

}
