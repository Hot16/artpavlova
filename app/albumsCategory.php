<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class albumsCategory extends Model
{
    protected $table = 'albums_category';
    protected $fillable = ['name', 'parent_id', 'cover_image', 'slug'];

    public function Albums(){
        return $this->hasMany('App\Albums', 'category_id');
    }

}
