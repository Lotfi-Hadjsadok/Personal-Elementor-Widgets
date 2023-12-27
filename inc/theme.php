<?php
/**
 * Theme related hooks.
 */


add_action( 'switch_theme', 'landing_master_on_theme_activation' );
function landing_master_on_theme_activation() {
	$elementor_cpts = array( 'post', 'page', 'product' );
	// Add cpts to elementor compatibility.
	update_option( 'elementor_cpt_support', $elementor_cpts );

	wp_insert_post(
		array(
			'post_type'  => 'page',
			'post_title' => 'Thank you',
            'post_name'=>'order',
            'post_status'=>'publish'
		)
	);
}



/**
 * Elementor Categories
 */
function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'landing-master',
		array(
			'title' => esc_html__( 'Landing Master', 'landing_master' ),
			'icon'  => 'fa fa-plug',
		)
	);
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


/**
 * Elementor Widgets
 */
function register_new_widgets( $widgets_manager ) {

	if ( get_post_type() === 'product' ) {
		require_once __DIR__ . '/elementor/product/product-price.php';
		require_once __DIR__ . '/elementor/product/product-sale-price.php';
		require_once __DIR__ . '/elementor/product/product-thumbnail.php';
		require_once __DIR__ . '/elementor/product/product-title.php';
		require_once __DIR__ . '/elementor/product/product-categories.php';
		require_once __DIR__ . '/elementor/product/product-order-form.php';
		require_once __DIR__ . '/elementor/product/product-offers.php';

		$widgets_manager->register( new \Elementor_Product_Price() );
		$widgets_manager->register( new \Elementor_Product_Sale_Price() );
		$widgets_manager->register( new \Elementor_Product_Thumbnail() );
		$widgets_manager->register( new \Elementor_Product_Title() );
		$widgets_manager->register( new \Elementor_Product_Categories() );
		$widgets_manager->register( new \Elementor_Product_Order_Form() );
		$widgets_manager->register( new \Elementor_Product_Offers() );

	}
}
add_action( 'elementor/widgets/register', 'register_new_widgets' );
