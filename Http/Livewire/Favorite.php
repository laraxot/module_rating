<?php
/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\Rating\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Rating\Models\Favorite as FavoriteModel;
use Modules\Xot\Services\PanelService;

/**
 * Class Favorite.
 */
class Favorite extends Component {
    // public $model;

    public int $post_id;

    public string $post_type;

    /**
     * @var int|string|null
     */
    public $user_id = null;

    public bool $fav;

    public string $type = 'default';

    // public string $view;

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function mount(Model $model/* , ?string $view = 'rating::livewire.favorite' */, ?string $type = 'default'): void {
        $this->post_type = PanelService::make()->get($model)->postType();
        /**
         * @var int
         */
        $id = $model->getKey();
        $this->post_id = $id;
        $this->user_id = Auth::id();

        $fav = FavoriteModel::where('user_id', $this->user_id)
            ->where('post_type', $this->post_type)
            ->where('post_id', $this->post_id)
            ->first();

        $this->fav = false;
        if (\is_object($fav)) {
            $this->fav = true;
        }

        $this->type = $type;
        // $this->view = $view;
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render() {
        /**
         * @phpstan-var view-string
         */
        // $view = 'rating::livewire.favorite';
        $view = 'rating::livewire.favorite.'.$this->type;

        // $view = $this->view;
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function update(): void {
        $data = [
            'user_id' => $this->user_id,
            'post_type' => $this->post_type,
            'post_id' => $this->post_id,
        ];

        if ($this->fav) {
            FavoriteModel::where($data)->delete();
        } else {
            FavoriteModel::firstOrCreate($data);
        }
        $this->fav = ! $this->fav;
    }
}
/*
window.livewire.on('alert', param => {
        toastr[param['type']](param['message']);
    });

$this->emit('alert', ['type' => 'success', 'message' => 'Agent has been changed.']);
*/
