<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaravelFollowTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followables', function (Blueprint $table) {
            $table->unsignedInteger('staff_id');
            $table->unsignedInteger('followable_id');
            $table->string('followable_type')->index();
            $table->string('relation')->default('follow')->comment('follow/like/subscribe/favorite/');
            $table->timestamp('created_at');
            $table->foreign('staff_id')
                ->references('staff', 'id')
                ->on('staff')
                ->onUpdate('cascade')
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
        Schema::table(config('follow.followable_table', 'followables'), function ($table) {
            $table->dropForeign(config('follow.followable_table', 'followables') . '_user_id_foreign');
        });
        Schema::drop(config('follow.followable_table', 'followables'));
    }
}
