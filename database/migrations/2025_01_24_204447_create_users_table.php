<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    // Criação da tabela 'users' com colunas necessárias para login
    Schema::create('users', function (Blueprint $table) {
        $table->id(); // ID único para cada usuário
        $table->string('name'); // Nome do usuário
        $table->string('email')->unique(); // E-mail único para login
        $table->string('password'); // Senha do usuário
        $table->rememberToken(); // Token usado para "lembrar-me"
        $table->timestamps(); // Colunas created_at e updated_at
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');// Remove a tabela em rollback
    }
}
