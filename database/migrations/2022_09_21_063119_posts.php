<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('image_path');
            $table->unsignedBigInteger('user_id');
            $table->integer('category_id');
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users');
           // $table->foreign('category_id')->references('id')->on('categories');
            

        });

       /*  DB::table('posts')->insert([
            [
            'title' =>'First post',
            'description' => ' Description Description',
            'image_path'=>'images/test_first.jpg',
            'user_id'=>3,
            'category_id' => 2

        ],
        [
            'title' =>'Second post',
            'description' => ' Description Description second ',
            'image_path'=>'images/test_second.jpg ',
            'user_id'=>3,
            'category_id' => 4

        ], */
        

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
