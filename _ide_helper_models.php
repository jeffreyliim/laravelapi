<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Issue
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $issue
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereIssue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Issue whereUserId($value)
 */
	class Issue extends \Eloquent {}
}

namespace App{
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
 */
	class IssueConversations extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Issue[] $issues
 */
	class User extends \Eloquent {}
}

