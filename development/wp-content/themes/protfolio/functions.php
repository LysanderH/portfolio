<?php

/**
 * Register post functionalities
 */
add_theme_support('post-thumbnails');

/**
 * Get theme assets
 */
function port_get_theme_asset($asset)
{
    return get_stylesheet_directory_uri() . '/' . ltrim($asset, '/');
}


/**
 * Get page title and heading
 */
function port_get_title($separator = '-', $displayTitleLeft = true)
{
    $title = trim(wp_title($separator, false, 'right'));

    if (!$title) {
        return get_bloginfo('name');
    }

    if ($displayTitleLeft) {
        return trim(wp_title($separator, false, 'right') . get_bloginfo('name'));
    } else {
        return get_bloginfo('name') . wp_title($separator, false, 'left');
    }
}

/**
 * Menus
 */

/***
 * Register main menu
 */
register_nav_menu('main', 'Navigation principale du site');
/***
 * Register footer menu
 */
register_nav_menu('footer', 'Navigation de pied de page');

/***
 * Get menu items as array
 */
function port_get_menu($location, $baseClass)
{
    global $object;
    $items = [];
    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menu = wp_get_nav_menu_items($id);
    /** Push each item of a link to an array */
    foreach ($menu as $i => $object) {

        $isTargettingHome = rtrim($object->url, '/') == rtrim(home_url(), '/');

        $item = new stdClass();
        $item->url = $object->url;
        $item->label = $object->title;
        $item->current = (is_home() && $isTargettingHome) || ($object->object_id == $object->ID);
        $item->target = $object->target;
        $item->classes = array_map(function ($item) use ($baseClass) {
            return $baseClass . '--' . $item;
        }, array_filter(array_merge([$item->current ? 'current' : null], $object->classes)));

        array_unshift($item->classes, $baseClass);

        $items[] = $item;
    }
    return $items;
}

/**
 * Register custom post types
 */
function port_register_post_types()
{
    /***
     * Register custom post type projects
     */
    register_post_type('project', [
        'labels' => [
            'name' => _x('Projets', 'Nom general du post type', 'portfolio'),
            'singular_name' => _x('Projet', 'Nom au singulier du post type', 'portfolio'),
            'menu_name' => _x('Projets', 'Test du menu admin', 'portfolio'),
            'name_admin_bar' => _x('Projet', 'Add New on Toolbar', 'portfolio'),
            'add_new' => __('Ajouter', 'portfolio'),
            'add_new_item' => __('Ajouter un nouveau projet', 'portfolio'),
            'new_item' => __('Nouveau projet', 'portfolio'),
            'edit_item' => __('Éditer le projet', 'portfolio'),
            'view_item' => __('Voir le projet', 'portfolio'),
            'all_items' => __('Tous les projets', 'portfolio'),
            'search_items' => __('Rechercher dans les projets', 'portfolio'),
            'parent_item_colon' => __('Projet parent:', 'portfolio'),
            'not_found' => __('Aucun projet trouvé.', 'portfolio'),
            'not_found_in_trash' => __('Aucun projet trouvé dans la corbeille.', 'portfolio'),
            'featured_image' => _x('Image de couverture', 'portfolio'),
            'set_featured_image' => _x('Ajouter une image de couverture', 'portfolio'),
            'remove_featured_image' => _x('Supprimer l’image de couverture', 'portfolio'),
            'use_featured_image' => _x('Utiliser comme image de couverture', 'portfolio'),
            'archives' => _x('Archive des projets', 'portfolio'),
            'insert_into_item' => _x('Ajouter au porjet', 'portfolio'),
            'uploaded_to_this_item' => _x('Téléverser vers se projet', 'portfolio'),
            'filter_items_list' => _x('Filtrer la liste des projets', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'portfolio'),
            'items_list_navigation' => _x('Liste de navigation des projets', 'portfolio'),
            'items_list' => _x('Liste des projets', 'portfolio'),
        ],
        'taxonomies' => array('category', 'post_tag'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-post',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    ]);
}

add_action('init', 'port_register_post_types');

/**
 * Get pagination links
 */

