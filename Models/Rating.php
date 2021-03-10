<?php

namespace Modules\Rating\Models;

/**
 * Modules\Rating\Models\Rating
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
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem($guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRelatedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost($guid)
 * @mixin \Eloquent
 * @property string|null $note
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereNote($value)
 * @property int $post_id
 * @method static \Illuminate\Database\Eloquent\Builder|Rating wherePostId($value)
 */
class Rating extends BaseModelLang
{
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'related_type'];

    //-------- relationship -----
    //-------- mutators ---------
    /*
    public function getRatingAvgAttribute($value){
        return $this->ratingMorph()->avg('rating');
    }
    */
}
