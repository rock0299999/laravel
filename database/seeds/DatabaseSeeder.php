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
    	//Model::unguard();
    	$this->call(PostsTableSeeder::Class);
    	$this->call(CommentsTableSeeder::Class);
        // $this->call(UsersTableSeeder::class);
        
    	//Model::reguard();
    }
}
