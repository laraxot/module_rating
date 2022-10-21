<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels\Actions\Favorite;

use Illuminate\Support\Facades\Route;
// -------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------

/**
 * Class NoMoreFavoriteAction.
 */
class NoMoreFavoriteAction extends XotBasePanelAction {
    public bool $onContainer = true;

    // public bool $onItem = true; //onlyContainer
    // mettere freccette su e giù

    public string $icon = '<i class="fa fa-arrow-up"></i><i class="fa fa-arrow-down"></i>';

    /**
     * @var int|string|null
     */
    public $user_id = null;

    /**
     * NoMoreFavoriteAction constructor.
     *
     * @param int|string|null $user_id
     */
    public function __construct($user_id) {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    // -- Perform the action on the given models.
    public function handle() {
        // dddx($this);
        // return '';
        // dddx($this->row);
        // dddx($this->rows);
    }

    public function postHandle(): string {
        // $this->rows->where('user_id', $this->user_id);
        // $route_params = Route::current()->parameters();
        [$containers,$items] = params2ContainerItem();
        $func = 'favorites';
        last($items)->$func()->where('user_id', $this->user_id)->delete();

        return 'fatto';
    }
}
