<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Donator;

class DonatorsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * test for correct donation addition.
     */
    public function test_a_donate_can_be_stored()
    {
        $data = [
            'id' => 1,
            'name' => 'Some name',
            'email' =>'some@email.com',
            'amount' => 2,
            'message' => 'Some message',
        ];
        $res = $this->post('/test/donators', $data);
        $this->assertDatabaseCount('donators', 1);
        $res->assertOk();
        $donate = Donator::first();
        $this->assertEquals($data['name'], $donate->name);
        $this->assertEquals($data['email'], $donate->email);
        $this->assertEquals($data['amount'], $donate->amount);
        $this->assertEquals($data['message'], $donate->message);
    }
}
