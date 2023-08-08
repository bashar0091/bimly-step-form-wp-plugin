<?php

// insert all user 
add_action( 'init', 'bimly_insert_users_into_table' );

function bimly_insert_users_into_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'bimly_submit_form';

    $user_ids = get_users( array( 'fields' => 'ID' ) );
    foreach ( $user_ids as $user_id ) {
        $existing_user_check = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$table_name} WHERE user_id = %d", $user_id ) );

        if ( $existing_user_check == 0 ) {
            $wpdb->insert(
                $table_name,
                array(
                    'user_id' => $user_id,
                ),
                array( '%d')
            );
        }
    }
}