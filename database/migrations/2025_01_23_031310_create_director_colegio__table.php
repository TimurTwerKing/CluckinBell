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
        Schema::create('director_colegio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('colegio_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('director_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("director_colegio", function (Blueprint $table) {
            $table->dropConstrainedForeignId("colegio_id");
            $table->dropConstrainedForeignId("director_id");
        });

        Schema::dropIfExists('director_colegio_');
    }
};
