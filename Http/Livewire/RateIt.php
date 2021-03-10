<?php

declare(strict_types=1);

namespace Modules\Rating\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Modules\Rating\Models\Favorite as FavoriteModel;
use Modules\Xot\Services\PanelService;

/**
 * Class RateIt.
 */
class RateIt extends Component {
    //public $model;

    public int $post_id;

    public string $post_type;

    /**
     * @var int|string|null
     */
    public $auth_user_id;

    //--------------

    public string $modal_guid;

    public string $modal_title;

    //public $fav;

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function mount(Model $model): void {
        $this->post_type = PanelService::get($model)->postType();
        $this->post_id = $model->getKey();
        $this->auth_user_id = \Auth::id();
        $this->modal_guid = 'modalrateit';
        $this->modal_title = 'Vota';
        /*
        $fav = FavoriteModel::where('auth_user_id', $this->auth_user_id)
            ->where('post_type', $this->post_type)
            ->where('post_id', $this->post_id)
            ->first();

        $this->fav = false;
        if (is_object($fav)) {
            $this->fav = true;
        }
        */
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render() {
        $view = 'xot::livewire.rate_it';
        $view_params = [
            'view' => $view,
            'time' => rand(1, 1000),
        ];

        return view($view, $view_params);
    }
}