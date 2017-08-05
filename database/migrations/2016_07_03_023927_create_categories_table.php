<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->comment('父级 id');
            $table->integer('post_count')->default(0)->comment('帖子数');
            $table->tinyInteger('weight')->default(0)->comment('权重');
            $table->string('name')->index()->comment('name');
            $table->string('slug', 60)->unique()->comment('缩略名');
            $table->string('description')->nullable()->comment('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
