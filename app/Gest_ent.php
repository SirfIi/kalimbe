<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gest_ent extends Model
{
    use SoftDeletes;
    protected $table = 'gest_ents';
    protected $fillable = [
        'nom',
        'email',
        'tel',
        'fonction',
        'type_gest',
        'id_ent',
        'id_user'
    ];
}
