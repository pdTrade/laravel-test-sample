<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Beverage;

class BeverageTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_visit_a_beverage_page_and_see_beverages()
    {
        $beverage = Beverage::factory()->create();

        $response = $this->get('/beverage');


        $response->assertSee($beverage->name);

        $response->assertStatus(200);
    }


}
