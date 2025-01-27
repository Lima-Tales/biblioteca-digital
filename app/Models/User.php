<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Os campos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',     // Nome do usuário
        'email',    // Email do usuário
        'password', // Senha do usuário
    ];

    /**
     * Os campos que serão ocultos em respostas JSON.
     *
     * @var array
     */
    protected $hidden = [
        'password',         // Esconde a senha
        'remember_token',   // Esconde o token de "lembrar-me"
    ];

    /**
     * Os atributos que devem ser convertidos para outros tipos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime', // Converte a data de verificação de email
    ];

    /**
     * Sempre criptografa a senha ao salvar.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
