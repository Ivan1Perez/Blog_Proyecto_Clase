<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Usuario extends Model implements AuthenticatableContract
{

    use Authenticatable;
    use HasFactory;
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
