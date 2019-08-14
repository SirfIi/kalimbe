<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ref extends Model
{
    use SoftDeletes;
    protected $table = 'refs';
    protected $fillable = [
        'id',
        'skill',
        'comp', 
        'level',
        'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
