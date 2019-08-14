<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ref_cand extends Model
{
    use SoftDeletes;
    protected $table = 'ref_cands';
    protected $fillable = [
        'id_post',
        'id_cand',
        'skill',
        'comp', 
        'level'
    ];
}
