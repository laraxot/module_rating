<?php

namespace Modules\Rating\Models\Panels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//--- Services --

use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class FavoritePanel.
 */
class FavoritePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Rating\Models\Favorite';

    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            0 => (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            1 => (object) [
                'type' => 'BigInt',
                'name' => 'post_id',
                'comment' => null,
            ],
            2 => (object) [
                'type' => 'String',
                'name' => 'post_type',
                'comment' => null,
            ],
            3 => (object) [
                'type' => 'Integer',
                'name' => 'auth_user_id',
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request = null) {
        return [
            new Actions\Favorite\NoMoreFavoriteAction(Auth::id()),
        ];
    }
}