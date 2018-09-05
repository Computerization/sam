<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content')->nullable();
            $table->tinyInteger('content_status')->default(0);
            $table->tinyInteger('comment_status')->default(1);
            $table->tinyInteger('content_type')->default(0);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->integer('user_id');
            $table->integer('organization_id')->nullable();
            $table->integer('upvote')->default(0);
            $table->integer('downvote')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
