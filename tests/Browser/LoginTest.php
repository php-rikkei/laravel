<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase {

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample() {

        $this->browse(function ($first) {
            $first->loginAs(User::find(1))
                    ->visit('/login')
                    ->value('#email', 'locnbl@gmail.com')
                    ->value('#password', '123123')
                    ->press('submit')
                    ->assertPathIs('/home');
        });
        $this->browse(function ($first, $second) {  
            $first->loginAs(User::find(1))
                    ->visit('/home');
        });
    }

}
