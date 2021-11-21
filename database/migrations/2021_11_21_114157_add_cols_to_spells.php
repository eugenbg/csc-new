<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToSpells extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spells', function (Blueprint $table) {
            $table->integer('tokens')->default(200);
            $table->decimal('temperature')->default(1);
            $table->decimal('top_p')->default(1);
            $table->decimal('frequency_penalty')->default(0);
            $table->decimal('presence_penalty')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spells', function (Blueprint $table) {
            //
        });
    }
}
