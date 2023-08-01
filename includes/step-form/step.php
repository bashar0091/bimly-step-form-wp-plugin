<?php

/**
 * 
 * Shortcode for bimly step form
 * 
 */

function bimly_step_form_shortcode() {
?>

    <div class="bimly_form_progress_section">
        <div class="bimly_form_progress">
            <div class="bimly_form_progress_inner"></div>
        </div>
    </div>

    <div class="bimly_step_form_section">
        <?php require_once('step-1.php');?>
        <?php require_once('step-2.php');?>
        <?php require_once('step-3.php');?>
        <?php require_once('step-4.php');?>
        <?php require_once('step-5.php');?>
        <?php require_once('step-6.php');?>
        <?php require_once('step-7.php');?>
        <?php require_once('step-8.php');?>
        <?php require_once('step-9.php');?>
        <?php require_once('step-10.php');?>
    </div>
<?php
}
add_shortcode( 'bimly-step-form', 'bimly_step_form_shortcode' );