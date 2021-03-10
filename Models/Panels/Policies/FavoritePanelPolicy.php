<?php
namespace Modules\Rating\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\Rating\Models\Panels\Policies\FavoritePanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class FavoritePanelPolicy extends XotBasePanelPolicy {
}
