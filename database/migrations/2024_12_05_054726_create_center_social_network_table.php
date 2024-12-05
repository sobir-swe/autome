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
        Schema::create('center_social_network', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->constrained('centers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('social_network_id')->constrained('social_networks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_social_network');
    }
};
