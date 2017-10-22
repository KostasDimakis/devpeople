<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quality extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image_asset'
    ];

    /**
     * Get all comments that contain this quality.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
