<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestABC extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample() {
        $this->assertDatabaseHas('users', [
            'email' => 'nlbloc94@gmail.com'
        ]);
    }
     public function testExample1() {
        $this->assertDatabaseMissing('users', [
            'email' => 'nlbloc9423@gmail.com'
        ]);
    }
     public function testExample2() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    

}
