<?php

use App\Models\ChinaUniversity;
use App\Models\Slug;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChinaUniSlugs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('china_universities', function (Blueprint $table) {
            $table->string('slug')->index('slug_index')->nullable();
        });

        $unis = ChinaUniversity::query()->get();
        foreach ($unis as $uni) {
            $uni->slug = Str::slug($uni->name);
            $uni->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Slug::where('type', '=', ChinaUniversity::class)->delete();
        Schema::table('china_universities', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
