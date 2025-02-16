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
        Schema::create('alumno_profesor', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("alumno_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("profesor_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("alumno_profesor", function (Blueprint $table) {
            $table->dropConstrainedForeignId("alumno_id");
            $table->dropConstrainedForeignId("profesor_id");
        });
        Schema::dropIfExists('alumno_profesor');
    }
};
