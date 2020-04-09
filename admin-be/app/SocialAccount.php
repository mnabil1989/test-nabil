<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\SocialAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider_user_id
 * @property string $provider
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $user
 * @method static Builder|SocialAccount newModelQuery()
 * @method static Builder|SocialAccount newQuery()
 * @method static Builder|SocialAccount query()
 * @method static Builder|SocialAccount whereCreatedAt($value)
 * @method static Builder|SocialAccount whereId($value)
 * @method static Builder|SocialAccount whereProvider($value)
 * @method static Builder|SocialAccount whereProviderUserId($value)
 * @method static Builder|SocialAccount whereUpdatedAt($value)
 * @method static Builder|SocialAccount whereUserId($value)
 * @mixin Eloquent
 */
class SocialAccount extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'provider_user_id', 'provider'
    ];

    /**
     * This resource belong to al-least one user.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
