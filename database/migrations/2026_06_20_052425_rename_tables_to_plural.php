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
	    Schema::rename('chicken', 'chickens');
	    Schema::rename('egg', 'eggs');
	    Schema::rename('garden', 'gardens');
	    Schema::rename('garden_plot', 'garden_plots');
	    Schema::rename('harvest', 'harvests');
	    Schema::rename('plant', 'plants');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
	    Schema::rename('chickens', 'chicken');
	    Schema::rename('eggs', 'egg');
	    Schema::rename('gardens', 'garden');
	    Schema::rename('garden_plots', 'garden_plot');
	    Schema::rename('harvests', 'harvest');
	    Schema::rename('plants', 'plant');
    }
};
