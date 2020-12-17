<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsHashtags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->after('id');
        });

        Schema::create('hashtags', function (Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('hashtag');

        });

        Schema::create('posts_hashtags', function (Blueprint $table){
            $table->foreignId('hashtag_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
        });

        Schema::dropIfExists('hashtags');

        Schema::dropIfExists('psts_hashtags');
    }
}
