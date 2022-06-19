<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Rating\Models\Like;

trait HasLikes {
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function likes() {
        return $this->likesRelation;
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    protected static function bootHasLikes() {
        static::deleting(function ($model) {
            $model->likesRelation()->delete();

            $model->unsetRelation('likesRelation');
        });
    }

    /**
     * param \Modules\LU\Models\User|null $user.
     *
     * @param \Modules\LU\Models\User $user
     *
     * @return void
     */
    public function likedBy($user) {
        $this->likesRelation()->create(['user_id' => $user->id]);

        $this->unsetRelation('likesRelation');
    }

    /**
     * param \Modules\LU\Models\User|null $user.
     *
     * @param \Modules\LU\Models\User $user
     *
     * @return void
     */
    public function dislikedBy($user) {
        /**
         * @var \Modules\Rating\Models\Like
         */
        $where = $this->likesRelation()->where('user_id', $user->id)->first();
        if (null != $where) {
            $where->delete();
        }

        $this->unsetRelation('likesRelation');
    }

    /**
     * It's important to name the relationship the same as the method because otherwise
     * eager loading of the polymorphic relationship will fail on queued jobs.
     *
     * @see https://github.com/laravelio/laravel.io/issues/350
     */
    public function likesRelation(): MorphMany {
        return $this->morphMany(Like::class, 'likesRelation', 'likeable_type', 'likeable_id');
    }

    /**
     * param \Modules\LU\Models\User|null $user.
     *
     * @param \Modules\LU\Models\User $user
     *
     * @return bool
     */
    public function isLikedBy($user) {
        return $this->likesRelation()->where('user_id', $user->id)->exists();
    }
}
