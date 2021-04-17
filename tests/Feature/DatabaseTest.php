<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $clients = factory(\Wefly\Client::class,20)->create();
        $vols = factory(\Wefly\Vol::class,15)->create();
        $resa = factory(\Wefly\Reservation::class,5)->create();

        $this->assertTrue(true);
    }
}
