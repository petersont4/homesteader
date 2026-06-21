<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('egg', function (Blueprint $table) {
		$table->renameColumn('eggID', 'id');
		$table->renameColumn('laidBy', 'laid_by');
		$table->renameColumn('eggColor', 'egg_color');
		$table->renameColumn('laidDateTime', 'laid_date_time');
		$table->renameColumn('goodEgg','good_egg');
		$table->timestamps();
	});
	Schema::table('egg', function (Blueprint $table) {
		$table->foreign('laid_by')->references('id')->on('chicken');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('egg', function (Blueprint $table) {
		$table->dropForeign('egg_laid_by_foreign');
	});

	Schema::table('egg', function (Blueprint $table) {
		$table->renameColumn('id', 'eggID');
		$table->renameColumn('laid_by', 'laidBy');
		$table->renameColumn('egg_color', 'eggColor');
		$table->renameColumn('laid_date_time', 'laidDateTime');
		$table->renameColumn('good_egg', 'goodEgg');
		$table->dropTimestamps();
        });
    }
};
