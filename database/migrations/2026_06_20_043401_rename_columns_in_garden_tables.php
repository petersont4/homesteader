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
	Schema::table('garden_plot', function (Blueprint $table) {
		$table->dropForeign('garden_plot_ibfk_1');
	});

	Schema::table('plant', function (Blueprint $table) {
		$table->dropForeign('plant_ibfk_1');
	});

	Schema::table('harvest', function (Blueprint $table) {
		$table->dropForeign('harvest_ibfk_1');
	});

        Schema::table('garden', function (Blueprint $table) {
		$table->renameColumn('gardenID', 'id');
		$table->renameColumn('gardenName', 'garden_name');
		$table->timestamps();
	});

	Schema::table('garden_plot', function (Blueprint $table) {
		$table->renameColumn('plotID', 'id');
		$table->renameColumn('plotLocation', 'plot_location');
		$table->renameColumn('plotGarden', 'plot_garden');
		$table->timestamps();
	});

	Schema::table('plant', function (Blueprint $table) {
		$table->renameColumn('plantID', 'id');
		$table->renameColumn('gardenLocation', 'garden_location');
		$table->renameColumn('purchaseDate', 'purchase_date');
		$table->renameColumn('groundDate', 'ground_date');
		$table->renameColumn('purchaseLocation', 'purchase_location');
		$table->renameColumn('purchasedType', 'purchased_type');
		$table->renameColumn('harvestUnit', 'harvest_unit');
		$table->timestamps();
	});

	Schema::table('harvest', function (Blueprint $table) {
		$table->renameColumn('harvestID', 'id');
		$table->renameColumn('plantID', 'plant_id');
		$table->renameColumn('harvestDate', 'harvest_date');
		$table->timestamps();
	});

	Schema::table('garden_plot', function (Blueprint $table) {
		$table->foreign('plot_garden')->references('id')->on('garden');
	});

	Schema::table('plant', function (Blueprint $table) {
		$table->foreign('garden_location')->references('id')->on('garden_plot');
	});

	Schema::table('harvest', function (Blueprint $table) {
		$table->foreign('plant_id')->references('id')->on('plant');
	});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('garden_plot', function (Blueprint $table) {
		$table->dropForeign('garden_plot_plot_garden_foreign');
	});

	Schema::table('plant', function (Blueprint $table) {
		$table->dropForeign('plant_garden_location_foreign');
	});

	Schema::table('harvest', function (Blueprint $table) {
		$table->dropForeign('harvest_plant_id_foreign');
	});

        Schema::table('garden', function (Blueprint $table) {
		$table->renameColumn('id', 'gardenID');
		$table->renameColumn('garden_name', 'gardenName');
		$table->dropTimestamps();
	});

	Schema::table('garden_plot', function (Blueprint $table) {
		$table->renameColumn('id', 'plotID');
		$table->renameColumn('plot_location', 'plotLocation');
		$table->renameColumn('plot_garden', 'plotGarden');
		$table->dropTimestamps();
	});

	Schema::table('plant', function (Blueprint $table) {
		$table->renameColumn('id', 'plantID');
		$table->renameColumn('garden_location', 'gardenLocation');
		$table->renameColumn('purchase_date', 'purchaseDate');
		$table->renameColumn('ground_date', 'groundDate');
		$table->renameColumn('purchase_location', 'purchaseLocation');
		$table->renameColumn('purchased_type', 'purchasedType');
		$table->renameColumn('harvest_unit', 'harvestUnit');
		$table->dropTimestamps();
	});

	Schema::table('harvest', function (Blueprint $table) {
		$table->renameColumn('id', 'harvestID');
		$table->renameColumn('plant_id', 'plantID');
		$table->renameColumn('harvest_date', 'harvestDate');
		$table->dropTimestamps();
	});

	Schema::table('garden_plot', function (Blueprint $table) {
		$table->foreign('plot_garden')->references('gardenID')->on('garden');
	});

	Schema::table('plant', function (Blueprint $table) {
		$table->foreign('gardenLocation')->references('plotID')->on('garden_plot');
	});

	Schema::table('harvest', function (Blueprint $table) {
		$table->foreign('plant_id')->references('plantID')->on('plant');
	});
    }
};
