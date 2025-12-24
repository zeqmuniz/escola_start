<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfis';

    protected $fillable = ['nome'];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
}
