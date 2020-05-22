<?php

function portfolio_register_theme_translations(){
    load_theme_textdomain('portfolio', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'portfolio_register_theme_translations');