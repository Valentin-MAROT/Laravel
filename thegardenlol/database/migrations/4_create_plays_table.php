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
        Schema::create('plays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('score1');
            $table->integer('score2');
            $table->foreignId('round_id')->constrained();
            $table->string('format');
            $table->string('date');
            $table->string('dateFin');
            $table->foreignId('equipe1_id')->constrained('equipes');
            $table->foreignId('equipe2_id')->constrained('equipes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plays');
    }
};
