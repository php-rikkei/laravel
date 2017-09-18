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
    public function testDatabaseExist() {
        $this->assertDatabaseHas('users', [
            'email' => 'nlbloc94@gmail.com'
        ]);
    }
     public function testDatabaseNotExist() {
        $this->assertDatabaseMissing('users', [
            'email' => 'nlbloc9423@gmail.com'
        ]);
    }
     public function testAccess() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function testSession() {
        $response = $this->withSession(['foo' => 'bar'])
                         ->get('/');
    }
    

}
