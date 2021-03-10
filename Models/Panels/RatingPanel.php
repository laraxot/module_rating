<?php

namespace Modules\Rating\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

//---- bases --

/**
 * Class RatingPanel
 * @package Modules\Rating\Models\Panels
 */
class RatingPanel extends XotBasePanel {
    /**
     * @var string
     */
    protected static string $model = 'Modules\Rating\Models\Rating';
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
    public function search() :array {

        return [];
    }

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @return string[]
     * @return string[]
     * @var array
     */
    public function with():array {
        return ['post'];
    }

    /**
     * on select the option id.
     */

    /**
     * on select the option label.
     * @param object $row
     * @return string
     */
    public function optionLabel(object $row):string {
        return $row->title;
    }


    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            //*
            (object) [
                'type' => 'Id',
                'name' => 'id',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'related_type',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'post.title',
            ],
            (object) [
                'type' => 'Decimal',
                'name' => 'pivot.rating',
            ],
            (object) [
                'type' => 'Text',
                'name' => 'pivot.auth_user_id',
            ],
            /*
            (object) [
            'type' => 'Text',
            'name' => 'post.subtitle',
            ],
            (object) [
            'type' => 'Textarea',
            'name' => 'post.txt',
            ],
             */
            // */
            /*
        (object) [
        'type' => 'Rating',
        'name' => 'myRatings',
        ],
         */
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
        return [];
    }

    /*
public function actions()
{
return [];
}

public function indexEdit(){
$params = \Route::current()->parameters();
list($containers,$items)=params2ContainerItem($params);
}
public function bodyContentView($params=[]){
extract($params);
$route_params = \Route::current()->parameters();
list($containers,$items)=params2ContainerItem($route_params);
//return $_layout->view_extend.'.body.multi_select';
return $_layout->view_extend.'.body.rating';
}
 */
}
