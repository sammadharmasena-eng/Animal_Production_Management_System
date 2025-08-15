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
        Schema::create('animal_records', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('user_id');
        $table->string('animal_type'); // chicken or cattle
        $table->string('breed');
        $table->float('meat_yield')->nullable();
        $table->integer('egg_production')->nullable();
        $table->float('milk_production')->nullable();
        $table->string('health_status');
        $table->string('photo_path')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('farmers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_records');
    }
};
