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
   		 $table->dropForeign('egg_ibfk_1');
	});
	Schema::table('chicken', function (Blueprint $table) {
		$table->renameColumn('chickenID', 'id');
		$table->renameColumn('chickenIdentifier', 'chicken_identifier');
		$table->renameColumn('eggColor', 'egg_color');
		$table->renameColumn('Breed', 'breed');
		$table->renameColumn('hatchDate', 'hatch_date');
		$table->timestamps();
    	});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chicken', function (Blueprint $table) {
		$table->dropTimestamps();
		$table->renameColumn('id', 'chickenID');
		$table->renameColumn('chicken_identifier', 'chickenIdentifier');
		$table->renameColumn('egg_color', 'eggColor');
		$table->renameColumn('breed', 'Breed');
		$table->renameColumn('hatch_date', 'hatchDate');

	});

	Schema::table('egg', function (Blueprint $table) {
		$table->foreign('laidBy')->references('chickenID')->on('chicken');
	});

    }
};
