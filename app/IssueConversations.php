<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\IssueConversations
 *
 * @property int $id
 * @property int $issue_id
 * @property string $conversation
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Issue $issue
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IssueConversations whereConversation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IssueConversations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IssueConversations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IssueConversations whereIssueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IssueConversations whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\IssueConversations whereUserId($value)
 */
class IssueConversations extends Model
{
    protected $table = 'issue_conversations';

    protected $fillable = [
        'user_id', 'issue_id', 'conversation'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

//    protected $with = [
//        'issue'
//    ];

    public $timestamps = true;

    public function issue()
    {
        return $this->belongsTo(Issue::class, 'issue_id');
    }


}
