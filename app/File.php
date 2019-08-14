<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $table = 'files';
    protected $fillable = [
        'user_id',
        'title',
        'type'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
