<?php

namespace Modules\Rating\Models;

//------- services ----
use Illuminate\Database\Eloquent\Model;
//------- traits ---
use Modules\Xot\Traits\Updater;

//------- services ----

/**
 * Modules\Rating\Models\Favorite
 *
 * @property int $id
 * @property string|null $post_type
 * @property int|null $post_id
 * @property int|null $auth_user_id
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereAuthUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite wherePostType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Favorite extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'post_id', 'post_type', 'auth_user_id'];
}
