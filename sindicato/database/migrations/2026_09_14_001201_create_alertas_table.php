<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('conteudo');
            $table->boolean('visivel')->default(true);
            $table->boolean('urgente')->default(true);
            $table->timestamps();
        });

        // Insere o aviso padrão inicial do sindicato com as novas colunas
        DB::table('alertas')->insert([
            'titulo' => 'Assembleia Geral Extraordinária:',
            'conteudo' => 'Quarta-feira, às 18h30, na sede do sindicato. Pauta: Votação da contraproposta de reajuste salarial 2026.',
            'visivel' => true,
            'urgente' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};
