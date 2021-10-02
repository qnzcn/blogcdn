<?php
	function muiteer_maintenance_mode() {
		if (get_theme_mod('muiteer_maintenance_user_role') == 'administrator' || get_theme_mod('muiteer_maintenance_user_role') == '') {
			if( !current_user_can('edit_themes') || !is_user_logged_in() ) {
		        $protocol = $_SERVER["SERVER_PROTOCOL"];
				if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol)
				$protocol = 'HTTP/1.0';
				header("$protocol 503 Service Unavailable", true, 503);
				header('Content-Type: text/html; charset=utf-8');
				require get_template_directory() . '/inc/maintenance/index.php';
				die();
		    }
	    } else if (get_theme_mod('muiteer_maintenance_user_role') == 'logged') {
	    	if( !is_user_logged_in() ) {
		        $protocol = $_SERVER["SERVER_PROTOCOL"];
				if ('HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol)
				$protocol = 'HTTP/1.0';
				header("$protocol 503 Service Unavailable", true, 503);
				header('Content-Type: text/html; charset=utf-8');
				require get_template_directory() . '/inc/maintenance/index.php';
				die();
		    }
	    }
	}
	add_action('get_header', 'muiteer_maintenance_mode');
?>