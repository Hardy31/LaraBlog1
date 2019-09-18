<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->date('date')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer("user_id")->nullable();
            $table->integer('status')->default(0) ;  //0 - черновик или 1-публичный доступ
            $table->integer('wiev')->default(0);   //количество просмотров
            $table->integer('is_featured')->default(0);  //для сайтбара 0-не показывать в рекомендованных, 1 рекомендованный
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
