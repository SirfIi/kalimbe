<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Candidature;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'parent_id', 'name','secteur', 'tel', 'adresse', 'description', 'ville', 'pays','email', 'site', 'taille', 'password', 'checked2', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function files()
    {
      return $this->hasMany(File::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_ent');
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class, 'id_cand');
    }
}
