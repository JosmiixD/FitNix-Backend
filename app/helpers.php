<?php

function setActive( $routeName ) {

    return request()->routeIs( $routeName ) ? 'menu-item-active' : '';

}

function setOpen( $parentRoute ) {

    return request()->routeIs( $parentRoute . '.*' ) ? 'menu-item-open' : '';
    
}