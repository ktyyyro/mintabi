<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathsToTravelBrochures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travel_brochures', function (Blueprint $table) {
            $table->string('image_paths')
                ->nullable()
                ->after('travel_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travel_brochures', function (Blueprint $table) {
            $table->dropColumn('image_paths');
        });
    }
}
