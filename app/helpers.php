<?php




function setActiveClass($route,$regex = true){
    $currentRouteName = \Request::route()->getName();
    $first = explode('.',$route);
    $module = $first[0];
    $moduleMethod = $first[1];
    return $currentRouteName == \Route::is('admin.'.$module.'.*') ? 'active' : '';
}

function adminRoute($route,$params = []){
    return route('admin.'.$route,$params);
}

function isTrue($value){
    return $value == true && $value == "true";
}
