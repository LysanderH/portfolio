<?php

function portfolio_register_custom_query_vars($vars) {
    $vars[] = 'projects-pagination';

    return $vars;
}

add_filter('query_vars', 'portfolio_register_custom_query_vars');