<?php
/**
 * Created by PhpStorm.
 * User: mrashid
 * Date: 4/26/2017
 * Time: 1:21 PM
 */

use \App\Models\Category;

function category_drop_down() {
    $categories = Category::all();
    return $categories;
}