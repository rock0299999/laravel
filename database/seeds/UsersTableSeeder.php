<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\User::truncate();
        //下條為調用 \factories/ModelFactory.php
        factory(\App\User::class,10)->create();
    }
}
