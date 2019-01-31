<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCanSearchForMessages() {
      $response = $this->get('/messages?query=Alice');
      $response->assertStatus(200);
      $response->assertSee('Alice');
    }
}