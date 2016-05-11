<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('confirmed');
            $table->integer('votes');
            $table->string('name');
            $table->text('description');
            $table->date('created');
            $table->datetime('created_at2');
            $table->timestamps('added_on');
			//->unllable()
			//->default($value)
			//->unsigned()
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
