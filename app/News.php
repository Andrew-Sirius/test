<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $guarded = ['deleted_at'];

    public function comment()
    {
        return $this->hasMany('App\Comment', 'new_id', 'id');
    }
}
