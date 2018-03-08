<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChPropParntIdForAlbumsCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('albums_category', function (Blueprint $table) {
            $table->integer('parent_id')->nullable(false)->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('albums_category', function (Blueprint $table) {
            $table->integer('parent_id')->nullable(true)->change();
        });
    }
}
