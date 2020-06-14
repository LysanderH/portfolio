<?php
/**
 * Register custom post types :
 * Projects
 */
function portfolio_register_post_types()
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

add_action('init', 'portfolio_register_post_types');

/**
 * Remove default post Type
 */
add_action('admin_menu', 'remove_default_post_type');

function remove_default_post_type()
{
    remove_menu_page('edit.php');
}

/**
 * Remove default post Type from menu bar
 */

add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

function remove_default_post_type_menu_bar($wp_admin_bar)
{
    $wp_admin_bar->remove_node('new-post');
}

/**
 * Remove default post Type
 */
add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

function remove_draft_widget()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}