<?php

function get_meno($pages) {
    $menu = "";
    foreach ($pages as $name => $link) {
        $menu .= "<li class='nav-item'><a class='nav-link' href='$link'>$name</a></li>";
    }
    return $menu;
}


function get_menu_items($items) {
    $menu = "";
    foreach ($items as $name => $link) {
        $menu .= "<li><a class='text-decoration-none' href='$link'>$name</a></li>";
    }
    return $menu;
}

function get_social_icons($icons) {
    $html = "";
    foreach ($icons as $icon => $link) {
        $html .= "<li class='list-inline-item border border-light rounded-circle text-center'>
                    <a class='text-light text-decoration-none' target='_blank' href='$link'>
                        <i class='fab fa-$icon fa-lg fa-fw'></i>
                    </a>
                  </li>";
    }
    return $html;
}





?>