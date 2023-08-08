<?php

// ajax form handler with database store 
add_action('wp_ajax_form_handler_action', 'form_ajax_handler');
add_action('wp_ajax_nopriv_form_handler_action', 'form_ajax_handler');

function form_ajax_handler(){
    global $wpdb;

    $table_name = $wpdb->prefix . 'bimly_submit_form';

    $work_type = sanitize_text_field($_POST['work_type']);
    $work_address = sanitize_text_field($_POST['work_address']);
    $work_date = sanitize_text_field($_POST['work_date']);
    $work_invester = sanitize_text_field($_POST['work_invester']);
    $investor_representative = sanitize_text_field($_POST['investor_representative']);
    $work_contractor = sanitize_text_field($_POST['work_contractor']);
    $contractor_representative = sanitize_text_field($_POST['contractor_representative']);
    $user_id = absint($_POST['user_id']);  // Make sure user_id is an integer

    $wpdb->insert(
        $table_name,
        array(
            'user_id' => $user_id,
            'work_type' => $work_type,
            'work_address' => $work_address,
            'work_date' => $work_date,
            'work_invester' => $work_invester,
            'investor_representative' => $investor_representative,
            'work_contractor' => $work_contractor,
            'contractor_representative' => $contractor_representative,
        )
    );

    echo json_encode(
        array(
            'success' => true
        )
    );

    wp_die();
}