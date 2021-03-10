<?php

declare(strict_types=1);

namespace Modules\Rating\Models\Panels\Actions;

//-------- services --------
use Illuminate\Support\Facades\Session;
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class RateItAction.
 */
class RateItAction extends XotBasePanelAction {
    /**
     * @var string
     */
    public ?string $name = 'rate';
    //name for calling Action
    //public $rows;
    //public $row;
    //public bool $onContainer = false;

    public bool $onItem = true; //onlyContainer

    public string $icon = '<span class="font-white"><i class="fa fa-star"></i> Vota !</span>';

    //*

    /**
     * @param array $params
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|void|null
     */
    public function btn(array $params = []) {
        extract($params);
        if (! isset($row)) {
            return 'row not set';
        }

        $this->setRow($row);
        $url = $this->urlItem($params);
        $title = 'Vota '.$this->row->title;

        $ratings = optional($row->ratings);
        $parz = [];
        $parz['rating_avg'] = round($ratings->avg('pivot.rating'), 2);
        $parz['rating_count'] = $ratings->count('pivot.rating');
        $parz['rating_url'] = $url;
        $parz['title'] = $title;
        $view = 'blog::actions.rate.btn';

        return view($view)->with($parz);
    }

    //*/

    //-- Perform the action on the given models.

    /**
     * @return mixed
     */
    public function handle() {
        $view = 'blog::actions.rate';

        return ThemeService::view($view)
            ->with('row', $this->row)
            ;
    }

    //end handle

    /**
     * @return mixed
     */
    public function postHandle() {
        //$panel = $this->updateRow(['row' => $this->row]);
        $panel = $this->panel->update(request()->all());
        $swal = [
            'icon' => 'success',
            'title' => 'Grazie di aver votato',
            //'text'=> 'clicca su back per torn!',
        ];
        Session::flash('swal', $swal);
        $this->setRow($panel->row);

        return $this->handle();
    }
}
