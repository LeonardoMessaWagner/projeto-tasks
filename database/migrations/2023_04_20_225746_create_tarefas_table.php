<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('tipo');
            $table->string('prioridade');
            $table->unsignedBigInteger('responsavel_id');
            $table->foreign('responsavel_id')->references('id')->on('users');
            $table->text('descricao');
            $table->boolean('situacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};