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
        Schema::create('chickens', function (Blueprint $table) {
            $table->id();
            $table->string('chicken_identifier');
            $table->string('egg_color');
            $table->string('breed', 20);
            $table->date('hatch_date');
            $table->timestamps();
        });

        Schema::create('eggs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laid_by')->constrained('chickens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('egg_color', 25);
            $table->datetime('laid_date_time');
            $table->boolean('good_egg');
            $table->string('notes', 254)->nullable();
            $table->timestamps();
        });

        Schema::create('gardens', function (Blueprint $table) {
            $table->id();
            $table->string('garden_name');
            $table->timestamps();
        });

        Schema::create('garden_plots', function (Blueprint $table) {
            $table->id();
            $table->string('plot_location');
            $table->foreignId('plot_garden')->constrained('gardens');
            $table->timestamps();
        });

        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->foreignId('garden_location')->constrained('garden_plots');
            $table->decimal('price', 10, 2);
            $table->date('purchase_date');
            $table->date('ground_date');
            $table->string('purchase_location');
            $table->string('purchased_type');
            $table->string('harvest_unit', 5);
            $table->timestamps();
        });

        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_id')->constrained('plants');
            $table->decimal('weight', 10, 2);
            $table->datetime('harvest_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('harvests');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('garden_plots');
        Schema::dropIfExists('gardens');
        Schema::dropIfExists('eggs');
        Schema::dropIfExists('chickens');
    }
};
