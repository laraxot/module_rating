<?php

declare(strict_types=1);

namespace Modules\Rating\Http\Livewire\Rate;

use Livewire\Component;
use Modules\Rating\Models\RatingMorph;
use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Services\PanelService;

/**
 * Class Single.
 */

//
// meglio spostare tutto in form_data
//
//

class Single extends Component {
    public ModelContract $model;

    public ModelContract $goal;

    public ?int $val;

    public int $post_id;

    public string $post_type;

    /**
     * @var int|string|null
     */
    public $auth_user_id = null;

    //--------------

    public string $modal_guid;

    public string $modal_title;

    //public $fav;

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \ReflectionException
     */
    public function mount(ModelContract $model, ModelContract $goal): void {
        $this->model = $model;
        $this->goal = $goal;
        $this->post_type = PanelService::get($model)->postType();
        $this->post_id = $model->getKey();
        $this->auth_user_id = \Auth::id();
        $this->modal_guid = 'modalrateit';
        $this->modal_title = 'Vota';
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render() {
        $view = 'blog::livewire.rate.single';

        $where = [
            'post_type' => $this->post_type,
            'post_id' => $this->post_id,
            'rating_id' => $this->goal->id,
            'auth_user_id' => $this->auth_user_id,
        ];

        $val = RatingMorph::firstWhere($where);

        $this->val = null;
        if (is_object($val)) {
            $this->val = (int) $val->value;
        }
        $view_params = [
            'view' => $view,
            'time' => rand(1, 1000),
        ];

        return view($view, $view_params);
    }

    public function update(int $val): void {
        session()->flash('message', 'Users Created Successfully.['.$val.']');
        $data = [
            'auth_user_id' => $this->auth_user_id,
            'post_type' => $this->post_type,
            'post_id' => $this->post_id,
            'rating_id' => $this->goal->id,
        ];
        $morph = RatingMorph::firstOrCreate($data);
        $morph->value = $val;
        $morph->save();
    }
}