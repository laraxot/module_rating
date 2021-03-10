<?php

namespace Modules\Rating\Models;

/**
 * Modules\Rating\Models\MyRating
 *
 * @property int $id
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property string|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $related_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Rating\Models\Favorite[] $favorites
 * @property-read int|null $favorites_count
 * @property-read mixed $create_url
 * @property-read mixed $destroy_url
 * @property-read mixed $detach_url
 * @property-read mixed $edit_url
 * @property mixed $guid
 * @property mixed $image_src
 * @property-read mixed $index_edit_url
 * @property-read mixed $index_url
 * @property-read mixed $lang
 * @property-read mixed $movedown_url
 * @property-read mixed $moveup_url
 * @property-read mixed $post_type
 * @property mixed $routename
 * @property-read mixed $show_url
 * @property-read mixed $subtitle
 * @property-read mixed $title
 * @property mixed $txt
 * @property-read mixed $update_url
 * @property mixed $url
 * @property-read mixed $user_handle
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Rating\Models\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Rating\Models\Favorite[] $myFavorites
 * @property-read int|null $my_favorites_count
 * @property-read \Modules\Rating\Models\Post|null $post
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem($guid)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost($guid)
 * @mixin \Eloquent
 * @property string|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating whereNote($value)
 * @property int $post_id
 * @method static \Illuminate\Database\Eloquent\Builder|MyRating wherePostId($value)
 */
class MyRating extends BaseModelLang
{
    /**
     * @var string
     */
    protected $table = 'ratings';
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'my_rating', 'related_type'];
    /**
     * @var string[]
     */
    protected $appends = ['my_rating'];
}
