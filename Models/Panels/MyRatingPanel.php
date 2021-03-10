<?php

namespace Modules\Rating\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class MyRatingPanel
 * @package Modules\Rating\Models\Panels
 */
class MyRatingPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\Rating\Models\MyRating';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    protected static array $search = [];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @return array

     * @var array
     */
    public function with():array {
        return [];
    }

    /**
     * @return array
     */
    public function search() :array {

        return [];
    }

    /**
     * on select the option id.
     * @param object $row
     * @return mixed
     */
    public function optionId(object $row) {
        return $row->area_id;
    }

    /**
     * on select the option label.
     * @param object $row
     * @return string
     */
    public function optionLabel(object $row):string {
        return $row->area_define_name;
    }

    /**
     * Get the fields displayed by the resource.
     *

     *
     * @return array
        'col_bs_size' => 6,
        'sortable' => 1,
        'rules' => 'required',
        'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
        'value'=>'..',
     */


    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            (object) [
                'type' => 'Text',
                'name' => 'my_rating',
                'comment' => 'not in Doctrine',
            ],
            (object) [
                'type' => 'String',
                'name' => 'related_type',
                'comment' => null,
            ],
        ];
    }


    /**
     * Get the actions available for the resource.
     *
     *
     * @param Request|null $request
     * @return array
     */
    public function actions(Request $request = null) {
        return [];
    }
    /*// deprecated ??
    public function bodyContentView(array $params = []) {
        //ddd($params);
        extract($params);
        //$route_params = \Route::current()->parameters();
        //list($containers,$items)=params2ContainerItem($route_params);
        if ('index_edit' == $_layout->act) {
            //return $_layout->view_extend.'.body.multi_select';
            return $_layout->view_extend.'.body.pivot_fields';
        } else {
            return $_layout->view_extend.'.body_content'; //.'.index';
        }
        //return $_layout->view_extend.'.body.rating';
    }
    //*/

    /**
     * @return string
     */
    public function indexEditSpecialCase() {
        return 'LOGGATI PER VOTARE';
    }
}
