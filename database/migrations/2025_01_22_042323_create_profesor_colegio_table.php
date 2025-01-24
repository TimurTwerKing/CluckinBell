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
        Schema::create('profesor_colegio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("colegio_id")->constrained();
            $table->foreignId("profesor_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("profesor_colegio", function (Blueprint $table) {
            $table->dropConstrainedForeignId("colegio_id");
            $table->dropConstrainedForeignId("profesor_id");
        });

        Schema::dropIfExists('profesor_colegio');
    }
};
