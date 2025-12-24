<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    protected $table = 'pessoas';

    protected $fillable = [
        'nome',
        'cpf',
        'dt_nascimento',
        'tel_numero',
        'email',
        'status',
    ];

    public function usuario()
    {
        return $this->hasOne(User::class);
    }
}
