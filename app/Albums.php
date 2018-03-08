<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'albums';
    protected $fillable = ['name', 'category_id', 'description', 'cover_image', 'slug'];

    public function Images(){
        return $this->hasMany('App\Images', 'album_id');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
