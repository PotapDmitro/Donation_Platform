<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Donator;

class DonatorsTest extends TestCase
{
    /**
     * The data from the query matches the data from the database.
     */
    public function the_correctness_of_the_request_data_test(){
        $post = Donator::find(1);
        $post_amount = $post->amount;
        $this->assertEquals($post_amount, 2);
        $this->assertIsNumeric($post_amount);
    }
}
