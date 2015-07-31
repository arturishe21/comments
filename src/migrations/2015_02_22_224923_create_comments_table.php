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
        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->integer('commentpage_id');
                $table->string('commentpage_type',255);
                $table->string('name',255);
                $table->text('message');
                $table->integer('user_id');
                $table->integer('rating');
                $table->integer('parent_id');
                $table->timestamps();

                $table->index('commentpage_id');
                $table->index('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }

}
