<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable=['link_id'];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
