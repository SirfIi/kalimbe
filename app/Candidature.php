<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
use Resume;
use Illuminate\Database\Eloquent\SoftDeletes;
class Candidature extends Model
{
    use SoftDeletes;
    protected $table = 'candidatures';
    protected $fillable = [
        'id_post',
        'id_cand',
        'id_ent',
        'status',
        'cv',
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'id_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
