<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Beverage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;

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

    public function test_beverage_has_name()
    {
        $name = $this->beverage->name;

        $this->assertNotEmpty($name);
    }

    public function test_beverage_has_type()
    {
        $type = $this->beverage->type;

        $this->assertNotEmpty($type);
    }

    public function test_a_minor_user_can_not_but_alcoholic_beverage()
    {
        $beverage = Beverage::factory()->create([
            'type' => 'Alcoholic'
        ]);

        $user = User::factory()->create([
            'age' => 17
         ]);

        $this->actingAs($user);

        $this->expectException(MinorCannotBuyAlcoholicBeverageException::class);

        $beverage->buy();
    }
}
