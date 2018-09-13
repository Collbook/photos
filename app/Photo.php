<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable = [
        'album_id', 'photo', 'title','size','description'
    ];

    public function photos()
    {
        return $this->belongsTo('App\Album');
    }
}
