<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'comment_author_user_id', 'comment_recipient_user_id', 'quality_id'
    ];

    /**
     * Get the author of this comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'comment_author_user_id');
    }

    /**
     * Get the recipient of this comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo('App\User', 'comment_recipient_user_id');
    }

    /**
     * Get quality of this comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quality()
    {
        return $this->belongsTo('App\Quality');
    }
}
