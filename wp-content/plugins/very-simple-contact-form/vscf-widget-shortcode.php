<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// start session for captcha validation
if (!isset ($_SESSION)) session_start(); 
$_SESSION['vscf-widget-rand'] = isset($_SESSION['vscf-widget-rand']) ? $_SESSION['vscf-widget-rand'] : rand(100, 999);

// the shortcode
function vscf_widget_shortcode($vscf_atts) {
	// attributes
	$vscf_atts = shortcode_atts( array( 
		"email_to" => get_bloginfo('admin_email'),
		"from_header" => vscf_from_header(),
		"subject" => '',
		"hide_subject" => '',
		"scroll_to_form" => '',
		"auto_reply" => '',
		"auto_reply_message" => '',
		"label_name" => '',
		"label_email" => '',
		"label_subject" => '',
		"label_captcha" => '',
		"label_message" => '',
		"label_privacy" => '',
		"label_submit" => '',
		"error_name" => '',
		"error_email" => '',
		"error_subject" => '',
		"error_captcha" => '',
		"error_message" => '',
		"message_success" => '',
		"message_error" => ''
	), $vscf_atts);

	// initialize variables
	$form_data = array(
		'form_name' => '',
		'form_email' => '',
		'form_subject' => '',
		'form_captcha' => '',
		'form_message' => '',
		'form_privacy' => '',
		'form_firstname' => '',
		'form_lastname' => ''
	);
	$error = false;
	$sent = false;
	$fail = false;

	// get custom settings from settingspage
	$list_submissions_setting = esc_attr(get_option('vscf-setting-2'));
	$auto_reply_setting = esc_attr(get_option('vscf-setting-3'));
	$privacy_setting = esc_attr(get_option('vscf-setting-4'));
	$ip_address_setting = esc_attr(get_option('vscf-setting-19'));

	// include labels
	include 'vscf-labels.php';

	// captcha for widget
	$captcha = $_SESSION['vscf-widget-rand'];

	// hide or display subject field 
	if ($vscf_atts['hide_subject'] == "true") {
		$hide_subject = true;
	}

	// hide or display privacy field 
	if ($privacy_setting != "yes") {
		$hide_privacy = true;
	}

	// set nonce field
	$nonce = wp_nonce_field( 'vscf_widget_nonce_action', 'vscf_widget_nonce', true, false ); 

	// name and id of widget submit button
	$submit_name_id = 'vscf_widget_send';

	// scroll back to form location after submit
	if ($vscf_atts['scroll_to_form'] == "true") {
		$action = 'action="#vscf-anchor"';
		$anchor_begin = '<div id="vscf-anchor">';
		$anchor_end = '</div>';
	} else {
		$action = '';
		$anchor_begin = '';
		$anchor_end = '';
	}

	// processing form
	if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['vscf_widget_send']) && isset( $_POST['vscf_widget_nonce'] ) && wp_verify_nonce( $_POST['vscf_widget_nonce'], 'vscf_widget_nonce_action' ) ) {
		// sanitize content
		$post_data = array(
			'form_name' => sanitize_text_field($_POST['vscf_name']),
			'form_email' => sanitize_email($_POST['vscf_email']),
			'form_subject' => sanitize_text_field($_POST['vscf_subject']),
			'form_captcha' => sanitize_text_field($_POST['vscf_captcha']),
			'form_message' => sanitize_textarea_field($_POST['vscf_message']),
			'form_privacy' => sanitize_key($_POST['vscf_privacy']),
			'form_firstname' => sanitize_text_field($_POST['vscf_firstname']),
			'form_lastname' => sanitize_text_field($_POST['vscf_lastname'])
		);

		// include validation
		include 'vscf-validate.php';

		// include sending and saving form submission
		include 'vscf-submission.php';
	}

	// include html form
	include 'vscf-form.php';
	
	// after form validation
	if ($sent == true) {
		unset($_SESSION['vscf-widget-rand']);
		return $anchor_begin . '<p class="vscf-info">'.esc_attr($result).'</p>' . $anchor_end;
	} elseif ($fail == true) {
		unset($_SESSION['vscf-widget-rand']);
		return $anchor_begin . '<p class="vscf-info">'.esc_attr($result).'</p>' . $anchor_end;
	} else {
		return $anchor_begin .$email_form. $anchor_end;
	}
} 
add_shortcode('contact-widget', 'vscf_widget_shortcode');
