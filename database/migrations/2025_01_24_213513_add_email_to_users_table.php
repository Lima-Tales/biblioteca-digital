<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailToUsersTable extends Migration
{
    /**
     * Execute as alterações na tabela.
     *
     * @return void
     */
    public function up()
    {
        // Verifica se a coluna 'email' já existe antes de tentar adicionar
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'email')) {
                $table->string('email')->unique()->nullable(false); // Adiciona a coluna de email
            }
        });
    }

    /**
     * Reverter as alterações na tabela.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
