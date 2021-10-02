<?php
	/** Enqueues general style
	 *
	 * @since 1.0.0
	*/

	function muiteer_general_style() {
		global $post;
		// Logo start
			$logo = esc_attr( get_theme_mod('muiteer_logo_height', 30) );
		// Logo end

		// Content maximum width start
			$muiteer_content_maximum_width = get_theme_mod('muiteer_content_maximum_width', '120rem');
		// Content maximum width end

		// Typography start
			$muiteer_typography = get_theme_mod('muiteer_typography');
			if ($muiteer_typography == "aleo") {
				$muiteer_typography = "Aleo, Times, Georgia, serif;";
			} else if ($muiteer_typography == "avenir_next") {
				$muiteer_typography = "Avenir Next, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else if ($muiteer_typography == "butler") {
				$muiteer_typography = "Butler, Times, Georgia, serif;";
			} else if ($muiteer_typography == "century_gothic") {
				$muiteer_typography = "Century Gothic, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else if ($muiteer_typography == "comfortaa") {
				$muiteer_typography = "Comfortaa, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else if ($muiteer_typography == "din") {
				$muiteer_typography = "Din, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else if ($muiteer_typography == "lucida_grande") {
				$muiteer_typography = "Lucida Grande, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else if ($muiteer_typography == "signika") {
				$muiteer_typography = "Signika, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else if ($muiteer_typography == "tungsten") {
				$muiteer_typography = "Tungsten, -apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			} else {
				$muiteer_typography = "-apple-system, 'SF Pro Text', 'Helvetica Neue', Helvetica, 'PingFang SC', 'Microsoft YaHei', Arial, sans-serif;";
			}
		// Typography end

		// Get general colors start
			if (muiteer_get_field('page-scheme') == 1) {
				$page_bg_color = muiteer_get_field('page-bg-color');
				$page_txt_color = muiteer_get_field('page-txt-color');
				$page_acc_color = muiteer_get_field('page-acc-color');
				$content_wrapper_bg_color = muiteer_get_field('muiteer_blog_content_wrapper_background_color');
			} else {
				$page_bg_color = get_theme_mod('muiteer_bg_color', '#f2f2f2');
				$page_txt_color = get_theme_mod('muiteer_txt_color', '#333333');
				$page_acc_color = get_theme_mod('muiteer_acc_color', '#0088cc');
				$content_wrapper_bg_color = get_theme_mod('muiteer_blog_content_wrapper_background_color', '#ffffff');
			};
		// Get general colors end

		// Page color start
			if (get_theme_mod('muiteer_dynamic_color', 'disabled') == 'disabled') {
				// For custom color scheme
				$custom_css = "
					/* Main color scheme start */
						/* Framework start */
							body {
								color: {$page_txt_color};
								font-family: {$muiteer_typography};
								background-color: {$page_bg_color};
							}
							.wrapper {
								max-width: {$muiteer_content_maximum_width};
							}
							/* Loading overlay start */
								.muiteer-loading-overlay-container {
									background-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .5);
								}
								.muiteer-loading-overlay-container:before {
									border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
									border-top-color: {$page_txt_color};
								}
							/* Loading overlay end */

							/* Post tag start */
								.post-tags a {
									color: {$page_txt_color} !important;
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
							/* Post tag end */

							/* Blocks start */
								/* Muiteer alert tips start */
									.muiteer-alert-tips-container .muiteer-alert-tips-box {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
								/* Muiteer alert tips end */
							/* Blocks end */
						/* Framework end */

						/* Media element start */
							.mejs-container * {
								font-family: {$muiteer_typography};
							}
						/* Media element end */

						/* Link start */
							a[href] {
								color: {$page_acc_color};
							}
							a[href]:active,
							a[href]:visited {
								color: {$page_acc_color};
							}
						/* Link end */

						/* Input & textarea start */
							input[type='text'],
							input[type='email'],
							input[type='password'],
							input[type='search'],
							input[type='number'],
							input[type='url'],
							input[type='tel'],
							input[type='date'],
							input[type='week'],
							input[type='month'],
							input[type='datetime-local'],
							input[type='time'],
							textarea {
								color: {$page_txt_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							input[type='text']::-webkit-input-placeholder,
							input[type='email']::-webkit-input-placeholder,
							input[type='password']::-webkit-input-placeholder,
							input[type='search']::-webkit-input-placeholder,
							input[type='number']::-webkit-input-placeholder,
							input[type='url']::-webkit-input-placeholder,
							input[type='tel']::-webkit-input-placeholder,
							input[type='date']::-webkit-input-placeholder,
							input[type='week']::-webkit-input-placeholder,
							input[type='month']::-webkit-input-placeholder,
							input[type='datetime-local']::-webkit-input-placeholder,
							input[type='time']::-webkit-input-placeholder,
							textarea::-webkit-input-placeholder {
								color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
							}
							input[type='text']::-webkit-input-placeholder,
							input[type='text']::-moz-input-placeholder,
							input[type='text']::-ms-input-placeholder,
							input[type='text']:-ms-input-placeholder,
							input[type='text']::placeholder,
							input[type='email']::-webkit-input-placeholder,
							input[type='email']::-moz-input-placeholder,
							input[type='email']::-ms-input-placeholder,
							input[type='email']:-ms-input-placeholder,
							input[type='email']::placeholder,
							input[type='password']::-webkit-input-placeholder,
							input[type='password']::-moz-input-placeholder,
							input[type='password']::-ms-input-placeholder,
							input[type='password']:-ms-input-placeholder,
							input[type='password']::placeholder,
							input[type='search']::-webkit-input-placeholder,
							input[type='search']::-moz-input-placeholder,
							input[type='search']::-ms-input-placeholder,
							input[type='search']:-ms-input-placeholder,
							input[type='search']::placeholder,
							input[type='number']::-webkit-input-placeholder,
							input[type='number']::-moz-input-placeholder,
							input[type='number']::-ms-input-placeholder,
							input[type='number']:-ms-input-placeholder,
							input[type='number']::placeholder,
							input[type='url']::-webkit-input-placeholder,
							input[type='url']::-moz-input-placeholder,
							input[type='url']::-ms-input-placeholder,
							input[type='url']:-ms-input-placeholder,
							input[type='url']::placeholder,
							input[type='tel']::-webkit-input-placeholder,
							input[type='tel']::-moz-input-placeholder,
							input[type='tel']::-ms-input-placeholder,
							input[type='tel']:-ms-input-placeholder,
							input[type='tel']::placeholder,
							input[type='date']::-webkit-input-placeholder,
							input[type='date']::-moz-input-placeholder,
							input[type='date']::-ms-input-placeholder,
							input[type='date']:-ms-input-placeholder,
							input[type='date']::placeholder,
							input[type='week']::-webkit-input-placeholder,
							input[type='week']::-moz-input-placeholder,
							input[type='week']::-ms-input-placeholder,
							input[type='week']:-ms-input-placeholder,
							input[type='week']::placeholder,
							input[type='month']::-webkit-input-placeholder,
							input[type='month']::-moz-input-placeholder,
							input[type='month']::-ms-input-placeholder,
							input[type='month']:-ms-input-placeholder,
							input[type='month']::placeholder,
							input[type='datetime-local']::-webkit-input-placeholder,
							input[type='datetime-local']::-moz-input-placeholder,
							input[type='datetime-local']::-ms-input-placeholder,
							input[type='datetime-local']:-ms-input-placeholder,
							input[type='datetime-local']::placeholder,
							input[type='time']::-webkit-input-placeholder,
							input[type='time']::-moz-input-placeholder,
							input[type='time']::-ms-input-placeholder,
							input[type='time']:-ms-input-placeholder,
							input[type='time']::placeholder,
							textarea::-webkit-input-placeholder,
							textarea::-moz-input-placeholder,
							textarea::-ms-input-placeholder,
							textarea:-ms-input-placeholder,
							textarea::placeholder {
								color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
							}
							input[type='date']::-webkit-datetime-edit-month-field,
							input[type='date']::-webkit-datetime-edit-day-field,
							input[type='date']::-webkit-datetime-edit-year-field {
								color: {$page_txt_color};
							}
							input[type='text']:focus,
							input[type='email']:focus,
							input[type='password']:focus,
							input[type='search']:focus,
							input[type='number']:focus,
							input[type='url']:focus,
							input[type='tel']:focus,
							input[type='date']:focus,
							input[type='week']:focus,
							input[type='month']:focus,
							input[type='datetime-local']:focus,
							input[type='time']:focus,
							textarea:focus {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
							}
						/* Input & textarea end */

						/* Range start */
							input[type='range']::-webkit-slider-runnable-track {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							input[type='range']::-moz-range-track {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							input[type='range']::-ms-track {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Range end */

						/* File start */
							.input-file-box {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.input-file-box .input-file-current {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* File end */

						/* Color start */
							input[type='color'] {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Color end */

						/* Progress start */
							progress {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							progress::-webkit-progress-value {
								background-color: {$page_acc_color};
							}
							progress::-moz-progress-bar {
								background-color: {$page_acc_color};
							}
							progress:indeterminate {
								background-image: linear-gradient(45deg, {$page_acc_color}, {$page_acc_color} 25%, transparent 25%, transparent 50%, {$page_acc_color} 50%, {$page_acc_color} 75%, transparent 75%, transparent);
							}
						/* Progress end */

						/* Select start */
							select {
								color: {$page_txt_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							select[size][multiple] option:checked,
							select[size][multiple] option[selected] {
								color: {$page_bg_color} !important;
								background: {$page_acc_color} linear-gradient(0deg, {$page_acc_color} 0%, {$page_acc_color} 100%) !important;
							}
							select:not([multiple]):not([size]) {
								background-image: url('data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20version%3D%221.1%22%20style%3D%22fill%3A%20rgb(" . muiteer_hex2RGB($page_txt_color, true) . ")%3B%22%3E%3Cpath%20d%3D%22M8.5%2C9l3.469%2C5L15.5%2C9H8.5z%22%2F%3E%3C%2Fsvg%3E');
							}
						/* Select end */

						/* Button start */
							.button,
							input[type='button'],
							input[type='reset'],
							input[type='submit'],
							button[type='submit'] {
								color: {$page_txt_color} !important;
								border-color: {$page_txt_color};
							}

							.button.button-primary,
							input[type='button'].button-primary,
							input[type='reset'].button-primary,
							input[type='submit'].button-primary,
							button[type='submit'].button-primary {
								color: {$page_bg_color} !important;
								background-color: {$page_txt_color};
							}

							.button:hover,
							input[type='button']:hover,
							input[type='reset']:hover,
							input[type='submit']:hover,
							button[type='submit']:hover {
								color: {$page_bg_color} !important;
								background-color: {$page_txt_color};
							}

							.button:hover.button-primary,
							input[type='button']:hover.button-primary,
							input[type='reset']:hover.button-primary,
							input[type='submit']:hover.button-primary,
							button[type='submit']:hover.button-primary {
								color: {$page_bg_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .8);
							}
						/* Button end */

						/* Checkbox start */
							input[type='checkbox'] {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							input[type='checkbox']:checked {
								border-color: {$page_acc_color};
								background-color: {$page_acc_color};
							}
							input[type='checkbox']:checked:before,
							input[type='checkbox']:checked:after {
								background-color: {$page_bg_color};
							}
						/* Checkbox end */

						/* Radio start */
							input[type='radio'] {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							input[type='radio']:checked {
								border-color: {$page_acc_color};
							}
							input[type='radio']:checked:before {
								background-color: {$page_acc_color};
							}
						/* Radio end */

						/* Table start */
							table,
							th,
							td {
								border-color: {$page_txt_color};
							}
							table thead {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
							}
						/* Table end */

						/* Keyboard input start */
							kbd {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Keyboard input end */

						/* Fieldset start */
							fieldset {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Fieldset end */

						/* Mark start */
							mark {
								color: {$page_bg_color};
								background-color: {$page_txt_color};
							}
						/* Mark end */

						/* Page loading start */
							.page-loading-transition.rotate {
								background-color: {$page_bg_color};
							}
							.page-loading-transition.rotate:before {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
								border-top-color: {$page_txt_color};
							}
							.page-loading-transition.swipe {
								background-color: {$page_bg_color};
							}
							.page-loading-transition.swipe:before,
							.page-loading-transition.swipe:after {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
							}
							.page-loading-transition.linear {
								background-color: {$page_txt_color};
							}
						/* Page loading end */

						/* Navigation start */
							.global-navigation-container.hamburger-menu-opened .global-navigation-holder,
							.global-navigation-container.hamburger-menu-opened .global-navigation-holder .navigation-logo,
							.global-navigation-container.hamburger-menu-opened .global-navigation-holder .menu-item a,
							.global-navigation-container:not(.transparent-mode) .global-navigation-holder,
							.global-navigation-container:not(.transparent-mode) .global-navigation-holder .navigation-logo,
							.global-navigation-container:not(.transparent-mode) .global-navigation-holder .menu-item a {
								color: {$page_txt_color} !important;
							}
							.global-navigation-container.image-logo-enabled .global-navigation-holder .navigation-logo svg {
								height: {$logo}px !important;
							}
							.global-navigation-container.sticky:after,
							.global-navigation-container.auto:after {
								background: -webkit-gradient(linear, left top, left bottom, from( rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .5) ), to( rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", 0) ));
								background: linear-gradient(to bottom, rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .5) 0%, rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", 0) 100%);
							}
							.hamburger-menu-container {
								background-color: {$page_bg_color};
							}
							.hamburger-menu-container .hamburger-menu-content nav .main-menu > .menu-item a {
								color: {$page_txt_color};
							}
							.global-navigation-container .global-navigation-holder .content-list .normal-menu-container nav .main-menu .menu-item .sub-menu {
								color: {$page_bg_color} !important;
								background-color: {$page_txt_color};
								border-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .1);
							}
							.global-navigation-container .global-navigation-holder .content-list .normal-menu-container nav .main-menu .menu-item .sub-menu:before {
								background-color: {$page_txt_color};
								border-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .1);
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content {
								color: {$page_txt_color} !important;
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								background-color: {$page_bg_color};
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content:before {
								border-left-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								border-top-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								background-color: {$page_bg_color};
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-loading:before {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
								border-top-color: {$page_txt_color};
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item .remove_from_cart_button {
								color: {$page_txt_color} !important;
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item .remove_from_cart_button:after {
								background-color: {$page_bg_color};
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item a:not(.remove_from_cart_button) {
								color: {$page_txt_color} !important;
							}
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item a:not(.remove_from_cart_button) .attachment-woocommerce_thumbnail,
							.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item a:not(.remove_from_cart_button) .woocommerce-placeholder {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Navigation end */

						/* Blog & portfolio start */
							.portfolio-grid .no-result {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Blog & portfolio end */

						/* Overlay mode start */
							.post-overlay-content-overlay .post-overlay-content-wrapper .post-overlay-content-box {
								color: {$page_txt_color};
								background-color: {$page_bg_color};
							}

							.post-overlay-content-overlay .post-overlay-content-wrapper .post-overlay-content-box .post-main-content-wrapper .post-overlay-loading {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
								border-top-color: {$page_txt_color};
							}
						/* Overlay mode end */
						
						/* Single post navigation start */
							.post-navigation-container .post-navigation-box a {
								color: {$page_txt_color};
							}
						/* Single post navigation end */

						/* Rating start */
							.rating-container .button.disabled {
								color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2) !important;
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.rating-container .button.disabled:hover {
								color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2) !important;
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1) !important;
							}
						/* Rating end */

						/* Post pagination start */
							.post-pagination-container .post-pagination-box a {
								color: {$page_bg_color} !important;
								background-color: {$page_txt_color} !important;
							}
						/* Post pagination end */

						/* Sidebar start */
							.site-sidebar .site-sidebar-wrap {
								color: {$page_txt_color};
								background-color: {$page_bg_color};
							}
							.site-sidebar .site-sidebar-wrap .site-sidebar-header {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Sidebar end */

						/* Widget start */
							.widget {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.widget .tagcloud a {
								color: {$page_txt_color} !important;
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Widget end */

						/* Comments start */
							.comments-container .comments-wrap {
								color: {$page_txt_color};
								background-color: {$page_bg_color};
							}
							.comments-container .comments-wrap .comments-header {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.comments-container .comments-wrap .comments-content .comment-respond {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.comments-container .comments-wrap .comments-content #comments-list .comment {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.comments-container .comments-wrap .comments-content #comments-list .comment article .comment-avatar .by-author .icon svg * {
								fill: {$page_bg_color};
							}
							.comments-container .comments-wrap .comments-content .comment-reply-link,
							.comments-container .comments-wrap .comments-content .comment-reply-login {
								color: {$page_txt_color} !important;
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
							}
							.comments-container .comments-wrap .comments-content .comment-respond .comment-reply-title small a {
								color: {$page_txt_color} !important;
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
							}
							.comments-container .comments-wrap .comments-content .comment-respond:before {
								border-bottom-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.comments-container .comments-wrap .comments-content .comment-navigation .nav-links .nav-previous a,
							.comments-container .comments-wrap .comments-content .comment-navigation .nav-links .nav-next a {
								color: {$page_txt_color} !important;
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
							}
							.comments-container .comments-wrap .comments-content .main-comments .loading:before {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
								border-top-color: {$page_txt_color};
							}
							.comments-container .comments-wrap .comments-content #comments-list .comment article .comment-content .comment-text p .comment-author-tag {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Comments end */

						/* Quick button start */
							.quick-button-container {
								background-color: {$page_txt_color};
								box-shadow: inset 0 0 0 .1rem rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .1);
							}
							@supports ((-webkit-backdrop-filter: initial) or (backdrop-filter: initial)) {
								.quick-button-container {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .7);
								}
							}
							.quick-button-container .quick-button .icon svg * {
								fill: {$page_bg_color};
							}
							.quick-button-container .quick-button-desc-box .icon svg * {
								fill: {$page_bg_color};
							}
							.quick-button-container .quick-button-desc-box .context {
								color: {$page_bg_color};
							}
						/* Quick button end */

						/* Related start */
							.related-article a {
								color: {$page_txt_color} !important;
							}
						/* Related end */

						/* Post password start */
							.post-password-form {
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
						/* Post password end */

						/* Friendly link start */
							.friendly-link-container .friendly-link-list .friendly-link-item .friendly-link-content,
							.friendly-link-carousel-container .friendly-link-carousel .swiper-wrapper .swiper-slide .friendly-link-content {
								background-color: {$page_bg_color};
							}
							.friendly-link-container .friendly-link-list .friendly-link-item .friendly-link-content picture,
							.friendly-link-carousel-container .friendly-link-carousel .swiper-wrapper .swiper-slide .friendly-link-content picture {
								background-color: {$page_bg_color};
							}
							.friendly-link-container .friendly-link-list .friendly-link-item .friendly-link-content .friendly-link-summary,
							.friendly-link-carousel-container .friendly-link-carousel .swiper-wrapper .swiper-slide .friendly-link-content .friendly-link-summary {
								color: {$page_txt_color};
							}
						/* Friendly link end */

						/* Recent post carousel start */
							.recent-post-carousel-header a {
								color: {$page_txt_color} !important;
							}
							.recent-post-carousel-container gallery ul li .tile-card {
								color: {$page_txt_color};
							}
						/* Recent post carousel end */

						/* Filter carousel start */
							.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide .filter-list-item .name {
								color: {$page_txt_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
							}
							.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide.current .filter-list-item .name {
								color: {$page_bg_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .8);
							}
							.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide .filter-list-item .name .badge {
								color: {$page_bg_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .5);
							}
							.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide.current .filter-list-item .name .badge {
								color: {$page_txt_color};
								background-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .5);
							}
						/* Filter carousel end */

						/* Brand wall start */
							/* River mode start */
								.brand-wall-container.river-mode .brand-wall-list .brand-wall-item picture {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.brand-wall-container.river-mode .brand-wall-list .brand-wall-item picture:after {
									box-shadow: inset 0 0 0 .1rem rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.brand-wall-container.river-mode .brand-wall-list .brand-wall-item picture .brand-name {
									color: {$page_bg_color};
									background-color: {$page_txt_color};
								}
							/* River mode end */

							/* Grid mode start */
								.brand-wall-container.grid-mode .brand-wall-list .brand-wall-item picture {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.brand-wall-container.grid-mode .brand-wall-list .brand-wall-item picture:after {
									box-shadow: inset 0 0 0 .1rem rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
							/* Grid mode end */
						/* Brand wall end */

						/* Swiper custom start */
							.swiper-lazy-preloader {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
								border-top-color: {$page_txt_color};
							}
							.swiper-button-prev, .swiper-button-next {
								color: {$page_bg_color};
								background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .7);
							}
							.swiper-button-prev:hover, .swiper-button-next:hover {
								background-color: {$page_txt_color};
							}
						/* Swiper custom end */

						/* Screen response start */
							.screen-response-container {
								color: {$page_bg_color};
								background-color: {$page_txt_color};
							}
						/* Screen response end */

						/* 404 start */
							.error404 .not-found-container {
								background-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .6);
							}
						/* 404 end */

						/* Footer start */
							.site-footer .social-icon-container ul li a {
								color: {$page_txt_color};
							}
							.site-footer .footer-statement-container a {
								color: {$page_txt_color};
							}
						/* Footer end */

						/* Old IE Browser start */
							.old-ie-browser body .compatible-tips-container {
								background-color: {$page_bg_color};
							}
						/* Old IE Browser end */

						/* WooCommerce start */
							/* Global start */
								.woocommerce-page.page .woocommerce {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.woocommerce-message,
								.woocommerce-info,
								.woocommerce-error {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.woocommerce-message a,
								.woocommerce-info a,
								.woocommerce-error a {
									color: {$page_txt_color};
								}
							/* Global end */

							/* Single product start */
								.single-product .single-product-content-container .entry-summary-container form.cart .single_add_to_cart_button .add-loading {
									background-color: {$page_txt_color};
								}
								.single-product .single-product-content-container .entry-summary-container form.cart .single_add_to_cart_button .add-loading:before {
									border-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .3);
									border-top-color: {$page_bg_color};
								}
								.single-product .single-product-content-container .entry-summary-container form.cart.variations_form table tbody tr .value .reset_variations {
									color: {$page_txt_color};
								}
								.single-product .single-product-content-container .entry-summary-container form.cart.variations_form table tbody tr .value .reset_variations:after {
									background-color: {$page_bg_color};
								}
							/* Single product end */

							/* Cart start */
								.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-remove .remove {
									color: {$page_txt_color} !important;
								}
								.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-remove .remove:after {
									background-color: {$page_bg_color};
								}
								.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-thumbnail a {
									color: {$page_txt_color} !important;
								}
								.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-name a {
									color: {$page_txt_color} !important;
								}
								.woocommerce-checkout form.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .place-order .woocommerce-terms-and-conditions-wrapper .woocommerce-terms-and-conditions {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.woocommerce-cart .cart-collaterals .cart_totals table.shop_table tbody tr.shipping td {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.woocommerce-cart .cart-collaterals .cross-sells {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
							/* Cart end */

							/* Checkout start */
								/* Login start */
									.woocommerce-checkout .woocommerce-form-login {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
								/* Login end */

								/* Coupon start */
									.woocommerce-checkout .woocommerce-form-coupon {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
								/* Coupon end */

								.woocommerce-checkout form.woocommerce-checkout .woocommerce-checkout-review-order table {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
							/* Checkout end */

							/* Order received start */
								.woocommerce-order-received .woocommerce-order .woocommerce-bacs-bank-details {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.woocommerce-order-received .woocommerce-order .woocommerce-order-details table {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.woocommerce-order-received .woocommerce-order .woocommerce-order-details table tbody tr td a {
									color: {$page_txt_color};
								}
								.woocommerce-order-received .woocommerce-order .woocommerce-customer-details address {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
							/* Order received end */

							/* My account start */
								/* Login / Register start */
									.woocommerce-account:not(.logged-in) .woocommerce .u-columns#customer_login .col-1,
									.woocommerce-account:not(.logged-in) .woocommerce .u-columns#customer_login .col-2 {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.woocommerce-account:not(.logged-in) .woocommerce .woocommerce-form.login,
									.woocommerce-account:not(.logged-in) .woocommerce .woocommerce-form.register {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
								/* Login / Register end */

								/* Logged start */
									/* Account nav start */
										.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li a {
											color: {$page_txt_color};
										}
										@media only screen and (max-width: 767px) {
											.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li a {
												background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
											}
										}
										.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a {
											background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
										}
										@media only screen and (max-width: 767px) {
											.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a {
												color: {$page_bg_color};
												background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .8);
											}
										}
									/* Account nav end */

									/* Orders start */
										.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-content table.woocommerce-orders-table {
											background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
										}
									/* Orders end */

									/* Addresses start */
										.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-content .woocommerce-Addresses .woocommerce-Address address {
											background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
										}
									/* Addresses end */

									/* Edit address start */
										.woocommerce-account.logged-in.woocommerce-edit-address .woocommerce form[method='post'] .woocommerce-address-fields {
											background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
										}
									/* Edit address end */

									/* View order start */
										.woocommerce-account.logged-in.woocommerce-view-order .woocommerce .woocommerce-order-details table {
											background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
										}
										.woocommerce-account.logged-in.woocommerce-view-order .woocommerce .woocommerce-order-details table tbody tr td a {
											color: {$page_txt_color};
										}
									/* View order end */

									/* Customer details start */
										.woocommerce-account.logged-in.woocommerce-view-order .woocommerce .woocommerce-customer-details address {
											background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
										}
									/* Customer details end */
								/* Logged end */
							/* My account end */

							/* Store notice start */
								.woocommerce-store-notice {
									color: {$page_bg_color};
									background-color: {$page_txt_color};
								}
							/* Store notice end */
						/* WooCommerce end */

						/* muiteerDocs start */
							/* Contents start */
								.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single .inside .muiteerdocs-doc-sections li a {
									color: {$page_txt_color};
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
								}
								.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single .inside .muiteerdocs-doc-sections li a:hover {
									background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
								}
								.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single > h3 a {
									color: {$page_txt_color};
								}
								.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single .muiteerdocs-doc-link a {
									color: {$page_bg_color};
									background-color: {$page_txt_color};
								}
							/* Contents end */

							/* Single page start */
								/* Sidebar for desktop start */
									.muiteerdocs-single-wrap .muiteerdocs-sidebar {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list .page_item a {
										color: {$page_txt_color};
									}
									.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.current_page_item {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.opened {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.page_item_has_children .children > .page_item.current_page_item {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
									}
									.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.page_item_has_children.opened > a {
										border-bottom-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
								/* Sidebar for desktop end */

								/* Sidebar for mobile start */
									.muiteerdocs-sidebar.mobile {
										color: {$page_txt_color};
										background-color: {$page_bg_color};
									}
									.muiteerdocs-sidebar.mobile .doc-nav-list .page_item a {
										color: {$page_txt_color};
									}
									.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.current_page_item {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.opened {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.page_item_has_children .children > .page_item.current_page_item {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
									}
									.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.page_item_has_children.opened > a {
										border-bottom-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
								/* Sidebar for mobile end */

								/* Content start */
									.muiteerdocs-single-wrap .muiteerdocs-single-content .muiteerdocs-breadcrumb {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content .muiteerdocs-breadcrumb li a {
										color: {$page_txt_color};
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .entry-content .article-child ul li a {
										color: {$page_txt_color};
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .entry-content .article-child ul li a:hover {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .entry-content .tags-links a {
										color: {$page_txt_color};
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-prev a,
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-next a {
										color: {$page_txt_color};
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .1);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-prev a:hover,
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-next a:hover {
										background-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .2);
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-feedback-wrap .vote-link-wrap a {
										color: {$page_bg_color};
										background-color: {$page_txt_color};
									}
									.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-contact-modal .muiteerdocs-modal-header .muiteerdocs-modal-close {
										color: {$page_txt_color};
									}
								/* Content end */
							/* Single page end */
						/* muiteerDocs end */

						/* Contact form 7 start */
							.wpcf7 form.wpcf7-form .wpcf7-form-control-wrap .wpcf7-not-valid-tip {
								color: {$page_bg_color};
								background-color: {$page_txt_color};
							}
							.wpcf7 form.wpcf7-form .wpcf7-form-control-wrap .wpcf7-not-valid-tip:before {
								background-color: {$page_txt_color};
							}
							.wpcf7 form.wpcf7-form .wpcf7-response-output {
								color: {$page_bg_color};
								background-color: {$page_txt_color};
							}
							.wpcf7 form.wpcf7-form .ajax-loader {
								background-color: rgba(" . muiteer_hex2RGB($page_bg_color, true) . ", .2);
							}
							.wpcf7 form.wpcf7-form .ajax-loader:before {
								border-color: rgba(" . muiteer_hex2RGB($page_txt_color, true) . ", .3);
								border-top-color: {$page_txt_color};
							}
						/* Contact form 7 end */
					/* Main color scheme end */

					/* Custom CSS start */
						{$user_css}
					/* Custom CSS end */
				";
			} else {
				$userAgent = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
				if ( preg_match('~MSIE|Internet Explorer~i', $userAgent) || (strpos($userAgent, 'Trident/7.0') !== false && strpos($userAgent, 'rv:11.0') !== false) ) {
					// IE browser start
						$custom_css = "
							/* Main color scheme start */
								/* Framework start */
									body {
										font-family: {$muiteer_typography};
									}
									.wrapper {
										max-width: {$muiteer_content_maximum_width};
									}
								/* Framework end */

								/* Media element start */
									.mejs-container * {
										font-family: {$muiteer_typography};
									}
								/* Media element end */

								/* Navigation start */
									.global-navigation-container.image-logo-enabled .global-navigation-holder .navigation-logo svg {
										height: {$logo}px !important;
									}
								/* Navigation end */
							/* Main color scheme end */

							/* Custom CSS start */
								{$user_css}
							/* Custom CSS end */
						";
					// IE browser end
				} else {
					// Other browser start
						// For dark mode
						$custom_css = "
							/* Main color scheme start */
								/* Framework start */
									body {
										color: var(--txt-color-100);
										font-family: {$muiteer_typography};
										background-color: var(--background-color-100);
									}
									.wrapper {
										max-width: {$muiteer_content_maximum_width};
									}
									/* Loading overlay start */
										.muiteer-loading-overlay-container {
											background-color: var(--background-color-50);
										}
										.muiteer-loading-overlay-container:before {
											border-color: var(--txt-color-30);
											border-top-color: var(--txt-color-100);
										}
									/* Loading overlay end */

									/* Message notice start */
										.muiteer-message-notice-container .muiteer-message-notice-item {
											color: var(--txt-color-100);
											background-color: var(--content-background-color-1);
										}
										.muiteer-message-notice-container .muiteer-message-notice-item .icon:before,
										.muiteer-message-notice-container .muiteer-message-notice-item .icon:after {
											background-color: var(--content-background-color-1) !important;
										}
										.muiteer-message-notice-container .muiteer-message-notice-item .close {
											background-color: var(--txt-color-10);
										}
									/* Message notice end */

									/* Post tag start */
										.post-tags a {
											color: var(--txt-color-100) !important;
											background-color: var(--txt-color-10);
										}
									/* Post tag end */

									/* Blocks start */
										/* Muiteer alert tips start */
											.muiteer-alert-tips-container .muiteer-alert-tips-box {
												background-color: var(--txt-color-10);
											}

											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color) {
												color: var(--alert-tips-title-color);
											}

											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-error {
												background-color: var(--alert-tips-background-color-error);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-error:after {
												box-shadow: inset 0 0 0 .1rem var(--alert-tips-border-color-error);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-error .icon svg * {
												fill: var(--alert-tips-icon-color-error);
											}

											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-warning {
												background-color: var(--alert-tips-background-color-warning);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-warning:after {
												box-shadow: inset 0 0 0 .1rem var(--alert-tips-border-color-warning);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-warning .icon svg * {
												fill: var(--alert-tips-icon-color-warning);
											}

											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-information {
												background-color: var(--alert-tips-background-color-info);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-information:after {
												box-shadow: inset 0 0 0 .1rem var(--alert-tips-border-color-info);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-information .icon svg * {
												fill: var(--alert-tips-icon-color-info);
											}

											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-success {
												background-color: var(--alert-tips-background-color-success);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-success:after {
												box-shadow: inset 0 0 0 .1rem var(--alert-tips-border-color-success);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color).muiteer-alert-tips-success .icon svg * {
												fill: var(--alert-tips-icon-color-success);
											}

											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color) .muiteer-alert-tips-description .muiteer-alert-tips-title {
												color: var(--alert-tips-title-color);
											}
											.muiteer-alert-tips-container .muiteer-alert-tips-box:not(.dynamic-color) .muiteer-alert-tips-description .muiteer-alert-tips-content {
												color: var(--alert-tips-content-color);
											}
										/* Muiteer alert tips end */
									/* Blocks end */
								/* Framework end */

								/* Media element start */
									.mejs-container * {
										font-family: {$muiteer_typography};
									}
								/* Media element end */

								/* Link start */
									a[href] {
										color: var(--accent-color);
									}
									a[href]:active,
									a[href]:visited {
										color: var(--accent-color);
									}
								/* Link end */

								/* Input & textarea start */
									input[type='text'],
									input[type='email'],
									input[type='password'],
									input[type='search'],
									input[type='number'],
									input[type='url'],
									input[type='tel'],
									input[type='date'],
									input[type='week'],
									input[type='month'],
									input[type='datetime-local'],
									input[type='time'],
									textarea {
										color: var(--txt-color-100);
										background-color: var(--txt-color-10);
									}
									input[type='text']::-webkit-input-placeholder,
									input[type='email']::-webkit-input-placeholder,
									input[type='password']::-webkit-input-placeholder,
									input[type='search']::-webkit-input-placeholder,
									input[type='number']::-webkit-input-placeholder,
									input[type='url']::-webkit-input-placeholder,
									input[type='tel']::-webkit-input-placeholder,
									input[type='date']::-webkit-input-placeholder,
									input[type='week']::-webkit-input-placeholder,
									input[type='month']::-webkit-input-placeholder,
									input[type='datetime-local']::-webkit-input-placeholder,
									input[type='time']::-webkit-input-placeholder,
									textarea::-webkit-input-placeholder {
										color: var(--txt-color-30);
									}
									input[type='text']::-webkit-input-placeholder,
									input[type='text']::-moz-input-placeholder,
									input[type='text']::-ms-input-placeholder,
									input[type='text']:-ms-input-placeholder,
									input[type='text']::placeholder,
									input[type='email']::-webkit-input-placeholder,
									input[type='email']::-moz-input-placeholder,
									input[type='email']::-ms-input-placeholder,
									input[type='email']:-ms-input-placeholder,
									input[type='email']::placeholder,
									input[type='password']::-webkit-input-placeholder,
									input[type='password']::-moz-input-placeholder,
									input[type='password']::-ms-input-placeholder,
									input[type='password']:-ms-input-placeholder,
									input[type='password']::placeholder,
									input[type='search']::-webkit-input-placeholder,
									input[type='search']::-moz-input-placeholder,
									input[type='search']::-ms-input-placeholder,
									input[type='search']:-ms-input-placeholder,
									input[type='search']::placeholder,
									input[type='number']::-webkit-input-placeholder,
									input[type='number']::-moz-input-placeholder,
									input[type='number']::-ms-input-placeholder,
									input[type='number']:-ms-input-placeholder,
									input[type='number']::placeholder,
									input[type='url']::-webkit-input-placeholder,
									input[type='url']::-moz-input-placeholder,
									input[type='url']::-ms-input-placeholder,
									input[type='url']:-ms-input-placeholder,
									input[type='url']::placeholder,
									input[type='tel']::-webkit-input-placeholder,
									input[type='tel']::-moz-input-placeholder,
									input[type='tel']::-ms-input-placeholder,
									input[type='tel']:-ms-input-placeholder,
									input[type='tel']::placeholder,
									input[type='date']::-webkit-input-placeholder,
									input[type='date']::-moz-input-placeholder,
									input[type='date']::-ms-input-placeholder,
									input[type='date']:-ms-input-placeholder,
									input[type='date']::placeholder,
									input[type='week']::-webkit-input-placeholder,
									input[type='week']::-moz-input-placeholder,
									input[type='week']::-ms-input-placeholder,
									input[type='week']:-ms-input-placeholder,
									input[type='week']::placeholder,
									input[type='month']::-webkit-input-placeholder,
									input[type='month']::-moz-input-placeholder,
									input[type='month']::-ms-input-placeholder,
									input[type='month']:-ms-input-placeholder,
									input[type='month']::placeholder,
									input[type='datetime-local']::-webkit-input-placeholder,
									input[type='datetime-local']::-moz-input-placeholder,
									input[type='datetime-local']::-ms-input-placeholder,
									input[type='datetime-local']:-ms-input-placeholder,
									input[type='datetime-local']::placeholder,
									input[type='time']::-webkit-input-placeholder,
									input[type='time']::-moz-input-placeholder,
									input[type='time']::-ms-input-placeholder,
									input[type='time']:-ms-input-placeholder,
									input[type='time']::placeholder,
									textarea::-webkit-input-placeholder,
									textarea::-moz-input-placeholder,
									textarea::-ms-input-placeholder,
									textarea:-ms-input-placeholder,
									textarea::placeholder {
										color: var(--txt-color-30);
									}
									input[type='date']::-webkit-datetime-edit-month-field,
									input[type='date']::-webkit-datetime-edit-day-field,
									input[type='date']::-webkit-datetime-edit-year-field {
										color: var(--txt-color-100);
									}
									input[type='text']:focus,
									input[type='email']:focus,
									input[type='password']:focus,
									input[type='search']:focus,
									input[type='number']:focus,
									input[type='url']:focus,
									input[type='tel']:focus,
									input[type='date']:focus,
									input[type='week']:focus,
									input[type='month']:focus,
									input[type='datetime-local']:focus,
									input[type='time']:focus,
									textarea:focus {
										background-color: var(--txt-color-20);
									}
								/* Input & textarea end */

								/* Range start */
									input[type='range']::-webkit-slider-runnable-track {
										background-color: var(--txt-color-10);
									}
									input[type='range']::-moz-range-track {
										background-color: var(--txt-color-10);
									}
									input[type='range']::-ms-track {
										background-color: var(--txt-color-10);
									}
								/* Range end */

								/* File start */
									.input-file-box {
										border-color: var(--txt-color-20);
										background-color: var(--txt-color-10);
									}
									.input-file-box .input-file-current {
										background-color: var(--txt-color-10);
									}
								/* File end */

								/* Color start */
									input[type='color'] {
										background-color: var(--txt-color-10);
									}
								/* Color end */

								/* Progress start */
									progress {
										background-color: var(--txt-color-10);
									}
									progress::-webkit-progress-value {
										background-color: var(--accent-color);
									}
									progress::-moz-progress-bar {
										background-color: var(--accent-color);
									}
									progress:indeterminate {
										background-image: linear-gradient(45deg, var(--accent-color), var(--accent-color) 25%, transparent 25%, transparent 50%, var(--accent-color) 50%, var(--accent-color) 75%, transparent 75%, transparent);
									}
								/* Progress end */

								/* Select start */
									select {
										color: var(--txt-color-100);
										background-color: var(--txt-color-10);
									}
									select[size][multiple] option:checked,
									select[size][multiple] option[selected] {
										color: var(--background-color-100) !important;
										background: var(--accent-color) linear-gradient(0deg, var(--accent-color) 0%, var(--accent-color) 100%) !important;
									}
									select:not([multiple]):not([size]) {
										background-image: url('data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20version%3D%221.1%22%20style%3D%22fill%3A%20%23333333%3B%22%3E%3Cpath%20d%3D%22M8.5%2C9l3.469%2C5L15.5%2C9H8.5z%22%2F%3E%3C%2Fsvg%3E');
									}
									@media (prefers-color-scheme: dark) {
										select:not([multiple]):not([size]) {
											background-image: url('data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20version%3D%221.1%22%20style%3D%22fill%3A%20%23ffffff%3B%22%3E%3Cpath%20d%3D%22M8.5%2C9l3.469%2C5L15.5%2C9H8.5z%22%2F%3E%3C%2Fsvg%3E');
										}
									}
								/* Select end */

								/* Button start */
									.button,
									input[type='button'],
									input[type='reset'],
									input[type='submit'],
									button[type='submit'] {
										color: var(--txt-color-100) !important;
										border-color: var(--txt-color-100);
									}

									.button.button-primary,
									input[type='button'].button-primary,
									input[type='reset'].button-primary,
									input[type='submit'].button-primary,
									button[type='submit'].button-primary {
										color: var(--background-color-100) !important;
										background-color: var(--txt-color-100);
									}

									.button:hover,
									input[type='button']:hover,
									input[type='reset']:hover,
									input[type='submit']:hover,
									button[type='submit']:hover {
										color: var(--background-color-100) !important;
										background-color: var(--txt-color-100);
									}

									.button:hover.button-primary,
									input[type='button']:hover.button-primary,
									input[type='reset']:hover.button-primary,
									input[type='submit']:hover.button-primary,
									button[type='submit']:hover.button-primary {
										color: var(--background-color-100);
										background-color: var(--txt-color-80);
									}
								/* Button end */

								/* Checkbox start */
									input[type='checkbox'] {
										border-color: var(--txt-color-10);
										background-color: var(--txt-color-10);
									}
									input[type='checkbox']:checked {
										border-color: var(--accent-color);
										background-color: var(--accent-color);
									}
									input[type='checkbox']:checked:before,
									input[type='checkbox']:checked:after {
										background-color: var(--background-color-100);
									}
								/* Checkbox end */

								/* Radio start */
									input[type='radio'] {
										border-color: var(--txt-color-10);
										background-color: var(--txt-color-10);
									}
									input[type='radio']:checked {
										border-color: var(--accent-color);
									}
									input[type='radio']:checked:before {
										background-color: var(--accent-color);
									}
								/* Radio end */

								/* Table start */
									table,
									th,
									td {
										border-color: var(--txt-color-100);
									}
									table thead {
										background-color: var(--txt-color-20);
									}
								/* Table end */

								/* Keyboard input start */
									kbd {
										border-color: var(--txt-color-10);
										background-color: var(--txt-color-10);
									}
								/* Keyboard input end */

								/* Fieldset start */
									fieldset {
										border-color: var(--txt-color-10);
									}
								/* Fieldset end */

								/* Mark start */
									mark {
										color: var(--background-color-100);
										background-color: var(--txt-color-100);
									}
								/* Mark end */

								/* Page loading start */
									.page-loading-transition.rotate {
										background-color: var(--background-color-100);
									}
									.page-loading-transition.rotate:before {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
									.page-loading-transition.swipe {
										background-color: var(--background-color-100);
									}
									.page-loading-transition.swipe:before,
									.page-loading-transition.swipe:after {
										background-color: var(--txt-color-30);
									}
									.page-loading-transition.linear {
										background-color: var(--txt-color-100);
									}
								/* Page loading end */

								/* Navigation start */
									.global-navigation-container.hamburger-menu-opened .global-navigation-holder,
									.global-navigation-container.hamburger-menu-opened .global-navigation-holder .navigation-logo,
									.global-navigation-container.hamburger-menu-opened .global-navigation-holder .menu-item a,
									.global-navigation-container:not(.transparent-mode) .global-navigation-holder,
									.global-navigation-container:not(.transparent-mode) .global-navigation-holder .navigation-logo,
									.global-navigation-container:not(.transparent-mode) .global-navigation-holder .menu-item a {
										color: var(--txt-color-100) !important;
									}
									.global-navigation-container.image-logo-enabled .global-navigation-holder .navigation-logo svg {
										height: {$logo}px !important;
									}
									.global-navigation-container.sticky:after,
									.global-navigation-container.auto:after {
										background: -webkit-gradient(linear, left top, left bottom, from( var(--background-color-50) ), to( var(--background-color-0) ));
										background: linear-gradient(to bottom, var(--background-color-50) 0%, var(--background-color-0) 100%);
									}
									.hamburger-menu-container {
										background-color: var(--background-color-100);
									}
									.hamburger-menu-container .hamburger-menu-content nav .main-menu > .menu-item a {
										color: var(--txt-color-100);
									}
									.global-navigation-container .global-navigation-holder .content-list .normal-menu-container nav .main-menu .menu-item .sub-menu {
										color: var(--background-color-100) !important;
										background-color: var(--txt-color-100);
										border-color: var(--background-color-10);
									}
									.global-navigation-container .global-navigation-holder .content-list .normal-menu-container nav .main-menu .menu-item .sub-menu:before {
										background-color: var(--txt-color-100);
										border-color: var(--background-color-10);
									}
									.search-bar-container.desktop .searchform input {
										color: var(--txt-color-100) !important;
										background-color: var(--content-background-color-1) !important;
										border-color: var(--txt-color-10);
									}
									.search-bar-container.desktop .searchform input::-webkit-input-placeholder {
										color: var(--txt-color-50) !important;
									}
									.search-bar-container.desktop .searchform input::-webkit-input-placeholder,
									.search-bar-container.desktop .searchform input::-moz-input-placeholder,
									.search-bar-container.desktop .searchform input::-ms-input-placeholder,
									.search-bar-container.desktop .searchform input:-ms-input-placeholder,
									.search-bar-container.desktop .searchform input::placeholder { 
										color: var(--txt-color-50) !important;
									}
									.search-bar-container.desktop .searchform .search-icon:before {
										border-color: var(--txt-color-100);
									}
									.search-bar-container.desktop .searchform .search-icon:after {
										background-color: var(--txt-color-100);
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content {
										color: var(--txt-color-100) !important;
										border-color: var(--txt-color-10);
										background-color: var(--content-background-color-1);
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content:before {
										border-left-color: var(--txt-color-10);
										border-top-color: var(--txt-color-10);
										background-color: var(--content-background-color-1);
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-loading:before {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item .remove_from_cart_button {
										color: var(--txt-color-100) !important;
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item .remove_from_cart_button:after {
										background-color: var(--background-color-100);
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item a:not(.remove_from_cart_button) {
										color: var(--txt-color-100) !important;
									}
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item a:not(.remove_from_cart_button) .attachment-woocommerce_thumbnail,
									.global-navigation-container .global-navigation-holder .content-list .content-item.shopping-bag-toggle .shopping-bag-content .shopping-bag-list .woocommerce-mini-cart .woocommerce-mini-cart-item a:not(.remove_from_cart_button) .woocommerce-placeholder {
										border-color: var(--txt-color-10);
									}
								/* Navigation end */

								/* Blog & portfolio start */
									.portfolio-grid .no-result {
										background-color: var(--txt-color-10);
									}
									.portfolio-grid .post-item-card .post-item-link {
										color: var(--txt-color-100);
										background-color: var(--content-background-color-1);
									}
									.portfolio-grid .post-item-card .post-item-link .post-featured-image-box .post-featured-image.muiteer-lazy-load.loading-active:before {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
								/* Blog & portfolio end */

								/* Overlay mode start */
									.post-overlay-content-overlay .post-overlay-content-wrapper .post-overlay-content-box {
										color: var(--txt-color-100);
										background-color: var(--content-background-color-1);
									}

									.post-overlay-content-overlay .post-overlay-content-wrapper .post-overlay-content-box .post-main-content-wrapper .post-overlay-loading {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
								/* Overlay mode end */

								/* Single post navigation start */
									.post-navigation-container .post-navigation-box a {
										color: var(--txt-color-100);
									}
								/* Single post navigation end */

								/* Rating start */
									.rating-container .button:not(.disabled) {
										border-color: var(--rating-border-color) !important;
										background-color: var(--rating-background-color) !important;
									}
									.rating-container .button:not(.disabled):hover {
										border-color: var(--rating-border-color) !important;
										background-color: var(--rating-background-color) !important;
									}
									.rating-container .button.disabled {
										color: var(--txt-color-20) !important;
										background-color: var(--txt-color-10);
									}
									.rating-container .button.disabled:hover {
										color: var(--txt-color-20) !important;
										background-color: var(--txt-color-10) !important;
									}
									.rating-container .button:not(.disabled).rating-dislike {
										color: var(--accent-color) !important;
									}
								/* Rating end */

								/* Sidebar start */
									.site-sidebar .site-sidebar-wrap {
										color: var(--txt-color-100);
										background-color: var(--content-background-color-1);
									}
									.site-sidebar .site-sidebar-wrap .site-sidebar-header {
										background-color: var(--txt-color-10);
									}
								/* Sidebar end */

								/* Widget start */
									.widget {
										background-color: var(--txt-color-10);
									}
									.widget .tagcloud a {
										color: var(--txt-color-100) !important;
										background-color: var(--txt-color-10);
									}
								/* Widget end */

								/* Comments start */
									.comments-container .comments-wrap {
										color: var(--txt-color-100);
										background-color: var(--content-background-color-1);
									}
									.comments-container .comments-wrap .comments-header {
										background-color: var(--txt-color-10);
									}
									.comments-container .comments-wrap .comments-content .comment-respond {
										background-color: var(--txt-color-10);
									}
									.comments-container .comments-wrap .comments-content #comments-list .comment {
										background-color: var(--txt-color-10);
									}
									.comments-container .comments-wrap .comments-content #comments-list .comment article .comment-avatar .by-author .icon svg * {
										fill: var(--background-color-100);
									}
									.comments-container .comments-wrap .comments-content .comment-reply-link,
									.comments-container .comments-wrap .comments-content .comment-reply-login {
										color: var(--txt-color-100) !important;
										background-color: var(--txt-color-20);
									}
									.comments-container .comments-wrap .comments-content .comment-respond .comment-reply-title small a {
										color: var(--txt-color-100) !important;
										background-color: var(--txt-color-20);
									}
									.comments-container .comments-wrap .comments-content .comment-respond:before {
										border-bottom-color: var(--txt-color-10);
									}
									.comments-container .comments-wrap .comments-content .comment-navigation .nav-links .nav-previous a,
									.comments-container .comments-wrap .comments-content .comment-navigation .nav-links .nav-next a {
										color: var(--txt-color-100) !important;
										background-color: var(--txt-color-20);
									}
									.comments-container .comments-wrap .comments-content .main-comments .loading:before {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
									.comments-container .comments-wrap .comments-content #comments-list .comment article .comment-content .comment-text p .comment-author-tag {
										background-color: var(--txt-color-10);
									}
								/* Comments end */

								/* Quick button start */
									.quick-button-container {
										background-color: var(--txt-color-100);
										box-shadow: inset 0 0 0 .1rem var(--background-color-10);
									}
									@supports ((-webkit-backdrop-filter: initial) or (backdrop-filter: initial)) {
										.quick-button-container {
											background-color: var(--txt-color-70);
										}
									}
									.quick-button-container .quick-button .icon svg * {
										fill: var(--background-color-100);
									}
									.quick-button-container .quick-button-desc-box .icon svg * {
										fill: var(--background-color-100);
									}
									.quick-button-container .quick-button-desc-box .context {
										color: var(--background-color-100);
									}
								/* Quick button end */

								/* Related start */
									.related-article a {
										color: var(--txt-color-100) !important;
									}
								/* Related end */

								/* Post password start */
									.post-password-form {
										background-color: var(--txt-color-10);
									}
								/* Post password end */

								/* Post pagination start */
									.post-pagination-container .post-pagination-box a {
										color: var(--background-color-100) !important;
										background-color: var(--txt-color-100) !important;
									}
								/* Post pagination end */

								/* Friendly link start */
									.friendly-link-container .friendly-link-list .friendly-link-item .friendly-link-content,
									.friendly-link-carousel-container .friendly-link-carousel .swiper-wrapper .swiper-slide .friendly-link-content {
										background-color: var(--background-color-100);
									}
									.friendly-link-container .friendly-link-list .friendly-link-item .friendly-link-content picture,
									.friendly-link-carousel-container .friendly-link-carousel .swiper-wrapper .swiper-slide .friendly-link-content picture {
										background-color: var(--background-color-100);
									}
									.friendly-link-container .friendly-link-list .friendly-link-item .friendly-link-content .friendly-link-summary,
									.friendly-link-carousel-container .friendly-link-carousel .swiper-wrapper .swiper-slide .friendly-link-content .friendly-link-summary {
										color: var(--txt-color-100);
									}
								/* Friendly link end */

								/* Recent post carousel start */
									.recent-post-carousel-header a {
										color: var(--txt-color-100) !important;
									}
									.recent-post-carousel-container gallery ul li .tile-card {
										color: var(--txt-color-100);
									}
								/* Recent post carousel end */

								/* Filter carousel start */
									.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide .filter-list-item .name {
										color: var(--txt-color-100);
										background-color: var(--txt-color-10);
									}
									.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide.current .filter-list-item .name {
										color: var(--background-color-100);
										background-color: var(--txt-color-80);
									}
									.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide .filter-list-item .name .badge {
										color: var(--background-color-100);
										background-color: var(--txt-color-50);
									}
									.filter-carousel-container.text .filter-carousel .swiper-wrapper .swiper-slide.current .filter-list-item .name .badge {
										color: var(--txt-color-100);
										background-color: var(--background-color-50);
									}
								/* Filter carousel end */

								/* Brand wall start */
									/* River mode start*/
										.brand-wall-container.river-mode .brand-wall-list .brand-wall-item picture {
											background-color: var(--txt-color-10);
										}
										.brand-wall-container.river-mode .brand-wall-list .brand-wall-item picture:after {
											box-shadow: inset 0 0 0 .1rem var(--txt-color-10);
										}
										.brand-wall-container.river-mode .brand-wall-list .brand-wall-item picture .brand-name {
											color: var(--background-color-100);
											background-color: var(--txt-color-100);
										}
									/* River mode end*/

									/* Grid mode start */
										.brand-wall-container.grid-mode .brand-wall-list .brand-wall-item picture {
											background-color: var(--txt-color-10);
										}
										.brand-wall-container.grid-mode .brand-wall-list .brand-wall-item picture:after {
											box-shadow: inset 0 0 0 .1rem var(--txt-color-10);
										}
									/* Grid mode end */
								/* Brand wall end */

								/* Swiper custom start */
									.swiper-lazy-preloader {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
									.swiper-button-prev, .swiper-button-next {
										color: var(--background-color-100);
										background-color: var(--txt-color-70);
									}
									.swiper-button-prev:hover, .swiper-button-next:hover {
										background-color: var(--txt-color-100);
									}
								/* Swiper custom end */

								/* Screen response start */
									.screen-response-container {
										color: var(--txt-color-100);
										background-color: var(--background-color-100);
									}
								/* Screen response end */

								/* 404 start */
									.error404 .not-found-container {
										background-color: var(--background-color-60);
									}
								/* 404 end */

								/* Site sharing start */
									.site-sharing-container .site-sharing-content {
										color: var(--txt-color-100);
										background-color: var(--content-background-color-1);
									}
									.site-poster-container .site-poster-content .card {
										color: var(--txt-color-100);
										background-color: var(--content-background-color-1);
									}
									.site-poster-container .site-poster-content .card .loading {
										border: solid .3rem var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
								/* Site sharing end */
								
								/* Footer start */
									.site-footer .social-icon-container ul li a {
										color: var(--txt-color-100);
									}
									.site-footer .footer-statement-container a {
										color: var(--txt-color-100);
									}
								/* Footer end */

								/* Old IE Browser start */
									.old-ie-browser body .compatible-tips-container {
										background-color: var(--background-color-100);
									}
								/* Old IE Browser end */

								/* Highlight code start */
									code,
									pre {
										color: var(--highlight-code-txt-color);
										background-color: var(--highlight-code-background-color);
									}
									code:not(.hljs) {
										border-color: var(--highlight-code-border-color);
									}
									pre {
										border-color: var(--highlight-code-border-color);
									}
									.hljs-ln-numbers {
										color: var(--highlight-code-number-txt-color);
										border-right-color: var(--highlight-code-border-color) !important;
									}
									
									.hljs {
										background-color: var(--highlight-code-background-color);
									}
									.hljs,
									.hljs-tag,
									.hljs-subst {
										color: var(--highlight-code-txt-color);
									}
									.hljs-strong,
									.hljs-emphasis {
										color: var(--highlight-code-txt-color-1);
									}
									.hljs-bullet,
									.hljs-quote,
									.hljs-number,
									.hljs-regexp,
									.hljs-literal,
									.hljs-link {
										color: var(--highlight-code-txt-color-2);
									}
									.hljs-code,
									.hljs-title,
									.hljs-section,
									.hljs-selector-class {
										color: var(--highlight-code-txt-color-3);
									}
									.hljs-keyword,
									.hljs-selector-tag,
									.hljs-name,
									.hljs-attr {
										color: var(--highlight-code-txt-color-4);
									}
									.hljs-symbol,
									.hljs-attribute {
										color: var(--highlight-code-txt-color-5);
									}
									.hljs-params,
									.hljs-class .hljs-title {
										color: var(--highlight-code-txt-color);
									}
									.hljs-string,
									.hljs-type,
									.hljs-built_in,
									.hljs-builtin-name,
									.hljs-selector-id,
									.hljs-selector-attr,
									.hljs-selector-pseudo,
									.hljs-addition,
									.hljs-variable,
									.hljs-template-variable {
										color: var(--highlight-code-txt-color-6);
									}
									.hljs-comment,
									.hljs-deletion,
									.hljs-meta {
										color: var(--highlight-code-txt-color-7);
									}
								/* Highlight code end */

								/* WooCommerce start */
									/* Global start */
										.woocommerce-page.page .woocommerce {
											background-color: var(--txt-color-10);
										}
										.woocommerce-message,
										.woocommerce-info,
										.woocommerce-error {
											background-color: var(--txt-color-10);
										}
										.woocommerce-message a,
										.woocommerce-info a,
										.woocommerce-error a {
											color: var(--txt-color-100);
										}
									/* Global end */

									/* Product list start */
										.product-content-container .product-list-container .product-grid .product-item-card .product-item-box {
											color: var(--txt-color-100);
											background-color: var(--content-background-color-1);
										}
										.product-content-container .product-list-container .product-grid .product-item-card .product-item-box .product-item-link {
											color: var(--txt-color-100);
										}
									/* Product list end */

									/* Single product start */
										.single-product .single-product-content-container .entry-summary-container form.cart .single_add_to_cart_button .add-loading {
											background-color: var(--txt-color-100);
										}
										.single-product .single-product-content-container .entry-summary-container form.cart .single_add_to_cart_button .add-loading:before {
											border-color: var(--background-color-30);
											border-top-color: var(--background-color-100);
										}
										.single-product .single-product-content-container .entry-summary-container form.cart.variations_form table tbody tr .value .reset_variations {
											color: var(--txt-color-100);
										}
										.single-product .single-product-content-container .entry-summary-container form.cart.variations_form table tbody tr .value .reset_variations:after {
											background-color: var(--background-color-100);
										}
									/* Single product end */

									/* Cart start */
										.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-remove .remove {
											color: var(--txt-color-100) !important;
										}
										.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-remove .remove:after {
											background-color: var(--background-color-100);
										}
										.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-thumbnail a {
											color: var(--txt-color-100) !important;
										}
										.woocommerce-cart .woocommerce-cart-form table tbody tr.cart_item .product-name a {
											color: var(--txt-color-100) !important;
										}
										.woocommerce-checkout form.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .place-order .woocommerce-terms-and-conditions-wrapper .woocommerce-terms-and-conditions {
											background-color: var(--txt-color-10);
										}
										.woocommerce-cart .cart-collaterals .cart_totals table.shop_table tbody tr.shipping td {
											background-color: var(--txt-color-10);
										}
										.woocommerce-cart .cart-collaterals .cross-sells {
											background-color: var(--txt-color-10);
										}
									/* Cart end */

									/* Checkout start */
										/* Login start */
											.woocommerce-checkout .woocommerce-form-login {
												background-color: var(--txt-color-10);
											}
										/* Login end */

										/* Coupon start */
											.woocommerce-checkout .woocommerce-form-coupon {
												background-color: var(--txt-color-10);
											}
										/* Coupon end */

										.woocommerce-checkout form.woocommerce-checkout .woocommerce-checkout-review-order table {
											background-color: var(--txt-color-10);
										}
									/* Checkout end */

									/* Order received start */
										.woocommerce-order-received .woocommerce-order .woocommerce-bacs-bank-details {
											background-color: var(--txt-color-10);
										}
										.woocommerce-order-received .woocommerce-order .woocommerce-order-details table {
											background-color: var(--txt-color-10);
										}
										.woocommerce-order-received .woocommerce-order .woocommerce-order-details table tbody tr td a {
											color: var(--txt-color-100);
										}
										.woocommerce-order-received .woocommerce-order .woocommerce-customer-details address {
											background-color: var(--txt-color-10);
										}
									/* Order received end */

									/* My account start */
										/* Login / Register start */
											.woocommerce-account:not(.logged-in) .woocommerce .u-columns#customer_login .col-1,
											.woocommerce-account:not(.logged-in) .woocommerce .u-columns#customer_login .col-2 {
												background-color: var(--txt-color-10);
											}
											.woocommerce-account:not(.logged-in) .woocommerce .woocommerce-form.login,
											.woocommerce-account:not(.logged-in) .woocommerce .woocommerce-form.register {
												background-color: var(--txt-color-10);
											}
										/* Login / Register end */

										/* Logged start */
											/* Account nav start */
												.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li a {
													color: var(--txt-color-100);
												}
												@media only screen and (max-width: 767px) {
													.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li a {
														background-color: var(--txt-color-10);
													}
												}
												.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a {
													background-color: var(--txt-color-10);
												}
												@media only screen and (max-width: 767px) {
													.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a {
														color: var(--background-color-100);
														background-color: var(--txt-color-80);
													}
												}
											/* Account nav end */

											/* Orders start */
												.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-content table.woocommerce-orders-table {
													background-color: var(--txt-color-10);
												}
											/* Orders end */

											/* Addresses start */
												.woocommerce-account.logged-in .woocommerce .woocommerce-MyAccount-content .woocommerce-Addresses .woocommerce-Address address {
													background-color: var(--txt-color-10);
												}
											/* Addresses end */

											/* Edit address start */
												.woocommerce-account.logged-in.woocommerce-edit-address .woocommerce form[method='post'] .woocommerce-address-fields {
													background-color: var(--txt-color-10);
												}
											/* Edit address end */

											/* View order start */
												.woocommerce-account.logged-in.woocommerce-view-order .woocommerce .woocommerce-order-details table {
													background-color: var(--txt-color-10);
												}
												.woocommerce-account.logged-in.woocommerce-view-order .woocommerce .woocommerce-order-details table tbody tr td a {
													color: var(--txt-color-100);
												}
											/* View order end */

											/* Customer details start */
												.woocommerce-account.logged-in.woocommerce-view-order .woocommerce .woocommerce-customer-details address {
													background-color: var(--txt-color-10);
												}
											/* Customer details end */
										/* Logged end */
									/* My account end */

									/* Store notice start */
										.woocommerce-store-notice {
											color: var(--background-color-100);
											background-color: var(--txt-color-100);
										}
									/* Store notice end */

									/* Mobile category start */
										.product-category-container.mobile .product-category-box {
											color: var(--txt-color-100);
											background-color: var(--content-background-color-1);
										}
									/* Mobile category end */
								/* WooCommerce end */

								/* muiteerDocs start */
									/* Contents start */
										.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single {
											background-color: var(--txt-color-10);
										}
										.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single .inside .muiteerdocs-doc-sections li a {
											color: var(--txt-color-100);
											background-color: var(--txt-color-10);
										}
										.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single .inside .muiteerdocs-doc-sections li a:hover {
											background-color: var(--txt-color-20);
										}
										.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single > h3 a {
											color: var(--txt-color-100);
										}
										.muiteerdocs-shortcode-wrap .muiteerdocs-docs-list .muiteerdocs-docs-single .muiteerdocs-doc-link a {
											color: var(--background-color-100);
											background-color: var(--txt-color-100);
										}
									/* Contents end */

									/* Single page start */
										/* Sidebar for desktop start */
											.muiteerdocs-single-wrap .muiteerdocs-sidebar {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list .page_item a {
												color: var(--txt-color-100);
											}
											.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.current_page_item {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.opened {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.page_item_has_children .children > .page_item.current_page_item {
												background-color: var(--txt-color-20);
											}
											.muiteerdocs-single-wrap .muiteerdocs-sidebar .doc-nav-list > .page_item.page_item_has_children.opened > a {
												border-bottom-color: var(--txt-color-10);
											}
										/* Sidebar for desktop end */

										/* Sidebar for mobile start */
											.muiteerdocs-sidebar.mobile {
												color: var(--txt-color-100);
												background-color: var(--background-color-100);
											}
											.muiteerdocs-sidebar.mobile .doc-nav-list .page_item a {
												color: var(--txt-color-100);
											}
											.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.current_page_item {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.opened {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.page_item_has_children .children > .page_item.current_page_item {
												background-color: var(--txt-color-20);
											}
											.muiteerdocs-sidebar.mobile .doc-nav-list > .page_item.page_item_has_children.opened > a {
												border-bottom-color: var(--txt-color-10);
											}
										/* Sidebar for mobile end */

										/* Content start */
											.muiteerdocs-single-wrap .muiteerdocs-single-content .muiteerdocs-breadcrumb {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content .muiteerdocs-breadcrumb li a {
												color: var(--txt-color-100);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs {
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .entry-content .article-child ul li a {
												color: var(--txt-color-100);
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .entry-content .article-child ul li a:hover {
												background-color: var(--txt-color-20);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .entry-content .tags-links a {
												color: var(--txt-color-100);
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-prev a,
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-next a {
												color: var(--txt-color-100);
												background-color: var(--txt-color-10);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-prev a:hover,
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-doc-nav .nav-next a:hover {
												background-color: var(--txt-color-20);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-feedback-wrap .vote-link-wrap a {
												color: var(--background-color-100);
												background-color: var(--txt-color-100);
											}
											.muiteerdocs-single-wrap .muiteerdocs-single-content article.type-docs .muiteerdocs-contact-modal .muiteerdocs-modal-header .muiteerdocs-modal-close {
												color: var(--txt-color-100);
											}
										/* Content end */
									/* Single page end */
								/* muiteerDocs end */

								/* Contact form 7 start */
									.wpcf7 form.wpcf7-form .wpcf7-form-control-wrap .wpcf7-not-valid-tip {
										color: var(--background-color-100);
										background-color: var(--txt-color-100);
									}
									.wpcf7 form.wpcf7-form .wpcf7-form-control-wrap .wpcf7-not-valid-tip:before {
										background-color: var(--txt-color-100);
									}
									.wpcf7 form.wpcf7-form .wpcf7-response-output {
										color: var(--background-color-100);
										background-color: var(--txt-color-100);
									}
									.wpcf7 form.wpcf7-form .ajax-loader {
										background-color: var(--background-color-30);
									}
									.wpcf7 form.wpcf7-form .ajax-loader:before {
										border-color: var(--txt-color-30);
										border-top-color: var(--txt-color-100);
									}
								/* Contact form 7 end */
							/* Main color scheme end */

							/* Custom CSS start */
								{$user_css}
							/* Custom CSS end */
						";
					// Other browser end
				};
			};
		// Page color end
		
		$custom_css = str_replace(array("\rn", "\r", "\n", "\t", '  ', '    ', '    '), '', $custom_css);
		wp_add_inline_style('muiteer-style', $custom_css);
	}
	add_action('wp_enqueue_scripts', 'muiteer_general_style', 10);
?>