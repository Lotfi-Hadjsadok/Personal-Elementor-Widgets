<?php
function cptui_register_my_cpts() {

/**
 * Post Type: Products.
 */

$labels = [
    "name" => esc_html__( "Products", "landing-master" ),
    "singular_name" => esc_html__( "Product", "landing-master" ),
    "menu_name" => esc_html__( "My products", "landing-master" ),
    "all_items" => esc_html__( "All products", "landing-master" ),
    "add_new" => esc_html__( "Add new", "landing-master" ),
    "add_new_item" => esc_html__( "Add new product", "landing-master" ),
    "edit_item" => esc_html__( "Edit product", "landing-master" ),
    "new_item" => esc_html__( "New product", "landing-master" ),
    "view_item" => esc_html__( "View product", "landing-master" ),
    "view_items" => esc_html__( "View products", "landing-master" ),
    "search_items" => esc_html__( "Search products", "landing-master" ),
    "not_found" => esc_html__( "No products found", "landing-master" ),
    "not_found_in_trash" => esc_html__( "No products found in trash", "landing-master" ),
    "parent" => esc_html__( "Parent product:", "landing-master" ),
    "featured_image" => esc_html__( "Featured image for this product", "landing-master" ),
    "set_featured_image" => esc_html__( "Set featured image for this product", "landing-master" ),
    "remove_featured_image" => esc_html__( "Remove featured image for this product", "landing-master" ),
    "use_featured_image" => esc_html__( "Use as featured image for this product", "landing-master" ),
    "archives" => esc_html__( "product archives", "landing-master" ),
    "insert_into_item" => esc_html__( "Insert into product", "landing-master" ),
    "uploaded_to_this_item" => esc_html__( "Upload to this product", "landing-master" ),
    "filter_items_list" => esc_html__( "Filter products list", "landing-master" ),
    "items_list_navigation" => esc_html__( "products list navigation", "landing-master" ),
    "items_list" => esc_html__( "products list", "landing-master" ),
    "attributes" => esc_html__( "products attributes", "landing-master" ),
    "name_admin_bar" => esc_html__( "product", "landing-master" ),
    "item_published" => esc_html__( "product published", "landing-master" ),
    "item_published_privately" => esc_html__( "product published privately.", "landing-master" ),
    "item_reverted_to_draft" => esc_html__( "product reverted to draft.", "landing-master" ),
    "item_trashed" => esc_html__( "product trashed.", "landing-master" ),
    "item_scheduled" => esc_html__( "product scheduled", "landing-master" ),
    "item_updated" => esc_html__( "product updated.", "landing-master" ),
    "parent_item_colon" => esc_html__( "Parent product:", "landing-master" ),
];

$args = [
    "label" => esc_html__( "Products", "landing-master" ),
    "labels" => $labels,
    "description" => "products on the website",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => true,
    "rewrite" => [ "slug" => "product", "with_front" => true ],
    "query_var" => true,
    "menu_icon" => "dashicons-products",
    "supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
    "taxonomies" => [ "category", "post_tag" ],
    "show_in_graphql" => false,
];

register_post_type( "product", $args );

/**
 * Post Type: Orders.
 */

$labels = [
    "name" => esc_html__( "Orders", "landing-master" ),
    "singular_name" => esc_html__( "Order", "landing-master" ),
    "menu_name" => esc_html__( "My Orders", "landing-master" ),
    "all_items" => esc_html__( "All Orders", "landing-master" ),
    "add_new" => esc_html__( "Add new", "landing-master" ),
    "add_new_item" => esc_html__( "Add new Order", "landing-master" ),
    "edit_item" => esc_html__( "Edit Order", "landing-master" ),
    "new_item" => esc_html__( "New Order", "landing-master" ),
    "view_item" => esc_html__( "View Order", "landing-master" ),
    "view_items" => esc_html__( "View Orders", "landing-master" ),
    "search_items" => esc_html__( "Search Orders", "landing-master" ),
    "not_found" => esc_html__( "No Orders found", "landing-master" ),
    "not_found_in_trash" => esc_html__( "No Orders found in trash", "landing-master" ),
    "parent" => esc_html__( "Parent Order:", "landing-master" ),
    "featured_image" => esc_html__( "Featured image for this Order", "landing-master" ),
    "set_featured_image" => esc_html__( "Set featured image for this Order", "landing-master" ),
    "remove_featured_image" => esc_html__( "Remove featured image for this Order", "landing-master" ),
    "use_featured_image" => esc_html__( "Use as featured image for this Order", "landing-master" ),
    "archives" => esc_html__( "Order archives", "landing-master" ),
    "insert_into_item" => esc_html__( "Insert into Order", "landing-master" ),
    "uploaded_to_this_item" => esc_html__( "Upload to this Order", "landing-master" ),
    "filter_items_list" => esc_html__( "Filter Orders list", "landing-master" ),
    "items_list_navigation" => esc_html__( "Orders list navigation", "landing-master" ),
    "items_list" => esc_html__( "Orders list", "landing-master" ),
    "attributes" => esc_html__( "Orders attributes", "landing-master" ),
    "name_admin_bar" => esc_html__( "Order", "landing-master" ),
    "item_published" => esc_html__( "Order published", "landing-master" ),
    "item_published_privately" => esc_html__( "Order published privately.", "landing-master" ),
    "item_reverted_to_draft" => esc_html__( "Order reverted to draft.", "landing-master" ),
    "item_trashed" => esc_html__( "Order trashed.", "landing-master" ),
    "item_scheduled" => esc_html__( "Order scheduled", "landing-master" ),
    "item_updated" => esc_html__( "Order updated.", "landing-master" ),
    "parent_item_colon" => esc_html__( "Parent Order:", "landing-master" ),
];

$args = [
    "label" => esc_html__( "Orders", "landing-master" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => false,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "rest_namespace" => "wp/v2",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => false,
    "rewrite" => [ "slug" => "landing_master_order", "with_front" => false ],
    "query_var" => false,
    "menu_icon" => "dashicons-cart",
    "supports" => [ "title" ],
    "show_in_graphql" => false,
];

register_post_type( "landing_master_order", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
