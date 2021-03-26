<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        (new DatabaseSeeder())->run();
    }

    public function test_admin_can_see_create_product_page()
    {
        $this->withoutExceptionHandling();

        $admin = User::query()->where('email', 'shaho.parvini@gmail.com')->first();

        $this->actingAs($admin);

        $this->get(route('product.create'))->dump();

    }
}
