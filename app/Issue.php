<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Issue
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $issue
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Issue[] $conversations
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereIssue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereUserId($value)
 */
class Issue extends Model
{
    protected $table = 'issues';

    public $fillable = [
        'user_id', 'issue'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

//    protected $with = [
//        'conversations', 'user'
//    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function conversations()
    {
        return $this->hasMany(IssueConversations::class);
    }

}
