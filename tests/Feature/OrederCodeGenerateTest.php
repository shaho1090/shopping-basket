<?php

namespace Tests\Feature;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrederCodeGenerateTest extends TestCase
{
    use RefreshDatabase;

    public function test_generate_code_for_order()
    {
//        $Codes = [];
//        for($i=0;$i<1000;$i++){
//           array_push($Codes,(new Order())->generateCode());
//        }
//
//        $this->assertEquals(array_count_values(array_unique($Codes)), array_count_values($Codes));
    }
}
