<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_comment_at',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_comment_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets gravatar img URL.
     *
     * @return string Gravatar img URL.
     */
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://www.gravatar.com/avatar/$hash";
    }

    /**
     * Gets gravatar img URL with 200 size px.
     *
     * @return string
     */
    public function getGravatar200Attribute()
    {
        return "$this->gravatar?size=200";
    }

    /**
     * Gets gravatar img URL with 30 size px.
     *
     * @return string
     */
    public function getGravatar30Attribute()
    {
        return "$this->gravatar?size=30";
    }

    /**
     * Get all the comments this user has authored.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentsAuthored()
    {
        return $this->hasMany('App\Comment', 'comment_author_user_id');
    }

    /**
     * Get all the comments this user has received.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commentsReceived()
    {
        return $this->hasMany('App\Comment', 'comment_recipient_user_id');
    }
}
