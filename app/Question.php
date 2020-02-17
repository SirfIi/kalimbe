<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    'titre',
    'libele',
    'id_post',
    'id_ent',
    'valeur',
    'coef',
    ];
}
