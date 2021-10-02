<?php
	function muiteer_license_mode() {
		$protocol = $_SERVER["SERVER_PROTOCOL"];
		if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol)
		$protocol = 'HTTP/1.0';
		header("$protocol 503 Service Unavailable", true, 503);
		header('Content-Type: text/html; charset=utf-8');
		require get_template_directory() . '/inc/license/index.php';
		die();
	}
	add_action('get_header', 'muiteer_license_mode');
?>