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
        Schema::create('equipe_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('equipe_id')->foreign('equipe_id')->references('id')->on('equipes');
            $table->string('user_id')->foreign('user_id')->references('id')->on('users');
            $table->string('role')->default('joueur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipes_users');
    }
};
