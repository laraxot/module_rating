<?php

namespace Modules\Rating\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

//----- actions ---
//use Modules\Rating\Models\Panels\Actions\RateItAction;

/**
 * Class RatingMorphPanel
 * @package Modules\Rating\Models\Panels
 */
class RatingMorphPanel extends XotBasePanel {
    /**
     * @var string
     */
    protected static string $model = 'Modules\Rating\Models\RatingMorph';
    /**
     * @var string
     */
    protected static string $title = 'title';
    /**
     * @var array
     */
    protected static array $search = [];

    /**
     * @return array
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
     * @param object $row
     * @return string
     */
    public function optionLabel(object $row):string {
        return $row->area_define_name;
    }


    /**
     * @return object[]
     */
    public function fields(): array {
        //$route_params = \Route::current()->parameters();
        [$containers, $items] = params2ContainerItem();

        return [
            /*
            (object) [
            'type' => 'Id',
            'name' => 'id',
            ],
            (object) [
            'type' => 'Integer',
            'name' => 'post_id',
            ],
            (object) [
            'type' => 'Text',
            'name' => 'post_type',
            ],
            (object) [
            'type' => 'Text',
            'name' => 'related_id',
            ],
             */
            /*
            (object) [
            'type' => 'Hidden',
            'name' => 'related_type',
            ],
             */
            /*
            (object) [
            'type' => 'Text',
            'name' => 'title',
            'comment' => 'not in Doctrine',
            ],
             */
            /*
            (object) [
            'type'     => 'Decimal',
            'sub_type' => 'JqStar',
            //'sub_type'=>'VueStar',
            'name'     => 'rating',
            ],
             */
            (object) [
                'type' => 'Rating',
                //'sub_type' => 'JqStar',
                //'sub_type'=>'VueStar',
                'name' => 'myRatings',
                'parent' => last($items),
            ],
            /*
        (object) [
        'type' => 'Hidden',
        'name' => 'auth_user_id',
        ],
        //*/
        ];
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs() {
        $tabs_name = [];

        return [];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request|null $request
     *
     * @return array
     */
    public function filters(Request $request = null) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request) {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     *
     * @return array
     */
    public function actions() {
        return [
            new Actions\RateItAction(),
        ];
    }
}
