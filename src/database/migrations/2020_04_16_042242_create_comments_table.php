<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * しおりのコメント
 */
class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('travel_brochures_id');   // しおりテーブルの外部キー
            $table->foreign('travel_brochures_id')
                ->references('id')
                ->on('travel_brochures')
                ->onDelete('cascade');
            $table->unsignedInteger('user_id');               // ユーザーテーブルの外部キー
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('title', 50);                        // コメントタイトル
            $table->text('comment');                            // コメント内容
            $table->softDeletes();                             // 論理削除
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
        Schema::dropIfExists('comments');
    }
}
