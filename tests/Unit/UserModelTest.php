<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_full_name_attribute()
    {
        $user = User::create(['firstname'=>'name1', 'lastname'=>'name2', 'email'=>'admin@test.com', 'password'=>'pass', 'age'=>30]);

        $this->assertEquals('name1 name2', $user->fullname);

    }

    public function test_user_has_age_attribute()
    {
        $user = User::factory(User::class)->create();

        $this->assertNotNull($user->age);
    }
}
