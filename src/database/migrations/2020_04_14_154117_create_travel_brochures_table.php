<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelBrochuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_brochures', function (Blueprint $table) {
            $table->increments('id');                   // しおりのid
            $table->string('destination', 50)          // 行き先
                ->nullable();
            $table->unsignedInteger('user_id');         // 作成者id(userテーブルのid)※todo作成者が退会してもしおりは残るものとするか仕様検討中
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamp('execution_date');        // 旅行日付
            $table->text('travel_items')                // 持ち物
                ->nullable();
            $table->text('remark')                      // 備考
                ->nullable();
            $table->softDeletes();                     // 論理削除
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
        Schema::dropIfExists('travel_brochures');
    }
}
