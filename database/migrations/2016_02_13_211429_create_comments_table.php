<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table)
        {
            $table->increments('id');
            $table->text('body', 140);
            $table->integer('comment_author_user_id')->unsigned()->index();
            $table->integer('comment_recipient_user_id')->unsigned()->index();
            $table->integer('quality_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('comment_author_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('comment_recipient_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('quality_id')
                  ->references('id')
                  ->on('qualities')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
