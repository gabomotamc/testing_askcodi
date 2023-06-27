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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('name');
            $table->string('iso_2');
            $table->string('iso_3');
            $table->string('phone_prefix');
            $table->string('currency_name');
            $table->string('currency_alpha3');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('capital');
            $table->string('region');
            $table->string('subregion');
            $table->integer('relevancy')->nullable();
            $table->integer('usage_count')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
