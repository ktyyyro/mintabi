<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * しおりとユーザーの中間テーブル(しおりの参加メンバーを紐付ける)
 */
class CreateTravelBrochuresUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_brochures_users', function (Blueprint $table) {
            $table->increments('id');                           // 中間テーブルのid
            $table->unsignedInteger('user_id');                 // ユーザーテーブルの外部キー
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('travel_brochures_id');     // しおりテーブルの外部キー
            $table->foreign('travel_brochures_id')
                ->references('id')
                ->on('travel_brochures')
                ->onDelete('cascade');
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
        Schema::dropIfExists('travel_brochures_users');
    }
}
