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
        Schema::create('unidade_endereco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('unid_id')->nullable()->after('id');
            $table->foreign('unid_id')->references('uni_id')->on('unidades')->onDelete('cascade');

            // Adiciona a coluna 'end_id' como chave estrangeira para a tabela 'enderecos'
            $table->unsignedBigInteger('end_id')->nullable()->after('unid_id');
            $table->foreign('end_id')->references('end_id')->on('enderecos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
