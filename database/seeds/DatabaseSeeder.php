<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UserTableSeeder');
    }
}
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            array('name_wallet'=>'Đi chợ','money_wallet'=>'200000','id_user'=>'1'),
            array('name_wallet'=>'Đi mua sắm','money_wallet'=>'300000','id_user'=>'1'),
            array('name_wallet'=>'Đi ăn','money_wallet'=>'400000','id_user'=>'1'),
            array('name_wallet'=>'Đi cắm trại','money_wallet'=>'420000','id_user'=>'1'),
            array('name_wallet'=>'Đi chùa','money_wallet'=>'200000','id_user'=>'1')
           ]);
    }
}

