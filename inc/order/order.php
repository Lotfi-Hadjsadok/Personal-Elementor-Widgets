<?php
/**
 * Order Functions
 */
function landing_master_order() {
	unset( $_POST['action'] );
	$order_id = wp_insert_post(
		array(
			'post_type'   => 'landing_master_order',
			'post_title'  => isset( $_POST['Name'] ) ? $_POST['Name'] : array_values($_POST)[1],
			'post_status' => 'publish',
			'post_author' => 1,
		)
	);
    $_POST['order_code'] = random_int(99999999, 999999999);
	update_post_meta( $order_id, 'order_data', $_POST );
    wp_redirect( '/thankyou?order='.$order_id.'&code='.$_POST['order_code'],301 );
}
add_action( 'admin_post_nopriv_landing_master_order', 'landing_master_order' );
add_action( 'admin_post_landing_master_order', 'landing_master_order' );

// Add custom columns to the custom post type
function landing_master_order_columns($columns) {
    $date = $columns['date'];
    unset($columns['date']);
    $columns['total_price'] = 'Total Price';
    $columns['order_data'] = 'Order Data';
    $columns = array_merge($columns,array('date'=>$date));
    return $columns;
}
add_filter("manage_edit-landing_master_order_columns", "landing_master_order_columns");

// Populate custom column data
function landing_master_order_column_data($column, $post_id) {
    switch ($column) {
        case 'order_data':
            $order_data = get_post_meta($post_id, 'order_data', true);
            foreach($order_data as $key => $data){
                echo '<strong>' .$key.'</strong> : '.$data . '<br />';
            }
            break;
            case 'total_price':
                $order_data = get_post_meta($post_id, 'order_data', true);
                if(isset($order_data['total_price'])){
                    echo $order_data['total_price'];
                }
                break;
            }
}
add_action("manage_landing_master_order_posts_custom_column", "landing_master_order_column_data", 10, 2);




function order_meta_box() {
    add_meta_box(
        'order_meta_box_id',          // Unique ID
        'Order Details',              // Meta Box Title
        'display_order_meta_box',     // Callback function to display content
        'landing_master_order',       // Post type
        'normal',                     // Context (normal, advanced, side)
        'high'                         // Priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'order_meta_box');


function display_order_meta_box($post) {
    $order_data = get_post_meta($post->ID, 'order_data', true);
    foreach($order_data as $key => $data){
        echo '<strong>' .$key.'</strong> : '.$data . '<br />';
    }
}