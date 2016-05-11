<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('zh_TW');
    	
        //
        foreach(range(1, 20) as $number){
        	\App\Post::create([ 
        			//'id' => $number,
        			'confirmed' => 1,
        			'name' => $faker->name,
        			'description' => $faker->title,
        			/*
        			'title' => '測試文章' . $number,
        			'sub_title' => '這是副標題',
        			'content' => '這是假文章內容',
        			'page_view' => 1,*/        			
        	]);
        	
        }
    }
}
