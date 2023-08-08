<?php

// making new database table 
add_action( 'init', 'bimly_submit_form_table_install' );

function bimly_submit_form_table_install() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'bimly_submit_form';

    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) === $table_name ) {
        return;
    }

    $sql = "CREATE TABLE {$table_name} (
        id INT NOT NULL AUTO_INCREMENT,
        user_id BIGINT UNSIGNED NOT NULL,
        work_type VARCHAR(255),
        work_address VARCHAR(255),
        work_date DATE,
        work_invester VARCHAR(255),
        investor_representative VARCHAR(255),
        work_contractor VARCHAR(255),
        contractor_representative VARCHAR(255),
        PRIMARY KEY (id),
        FOREIGN KEY (user_id) REFERENCES {$wpdb->prefix}users(ID)
    ) {$wpdb->get_charset_collate()};";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $result = dbDelta( $sql );

    if ( is_wp_error( $result ) ) {
        error_log( 'Error creating database table: ' . $result->get_error_message() );
    }
}
