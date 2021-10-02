<?php
	/**
	 * The template for displaying comments.
	 *
	 * This is the template that displays the area of the page that contains both the current comments
	 * and the comment form.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Muiteer
	 */

	/*
	* If the current post is protected by a password and
	* the visitor has not yet entered the password we will
	* return early without loading the comments.
	*/
	if ( post_password_required() ) {
		return;
	}
?>

<section id="comments" class="comments-container">
	<div class="comments-wrap">
		<header class="comments-header">
			<div class="comments-title">
				<span class="close"></span>
				<h3><?php echo esc_html__('Comments', 'muiteer'); ?></h3>
			</div>
		</header>
		<div class="comments-content">
			<div class="comments-box">
				<?php
					comment_form(
						array(
							'fields' => apply_filters('comment_form_default_fields',
								array(
									'author' => '
										<div class="form-author">
											<input id="author" name="author" type="text" placeholder="' . esc_html__('Name', 'muiteer') . '" />
										</div>
									',
									'email' => '
										<div class="form-email">
											<input id="email" name="email" type="text" placeholder="' . esc_html__('Email', 'muiteer') . '" />
										</div>
									',
									'url' => '
										<div class="form-website">
											<input id="url" name="url" type="text" placeholder="' . esc_html__('Website', 'muiteer') . '" />
										</div>
									',
								)
							),
							'comment_field' => '
								<div class="form-comment">
									<textarea id="comment" name="comment" placeholder="' . esc_html__('Comment', 'muiteer') . '"></textarea>
								</div>
							',
							'must_log_in' => '<p class="must-log-in">' .  sprintf( wp_kses( __('You must be <a href="%1$s">logged in</a> to post a comment.', 'muiteer'), array( 'a' => array( 'href' => array() ) ) ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
							'logged_in_as' => '<p class="logged-in-as">' . sprintf( wp_kses( __('You are logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'muiteer'), array( 'a' => array( 'href' => array() ) ) ), admin_url('profile.php'), isset($user_identity) ? $user_identity : '', wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
							'comment_notes_before' => '',
							'comment_notes_after' => '',
							'id_form' => 'comment-form',
							'class_submit' => 'button-primary button-round',
							'id_submit' => 'submit',
							'title_reply' => esc_html__('Comment', 'muiteer'),
							'title_reply_to' => esc_html__('Reply', 'muiteer'),
							'cancel_reply_link' => esc_html__('Cancel', 'muiteer'),
							'label_submit' => esc_html__('Send', 'muiteer'),
						)
					);
				?>
			</div>
			<div class="main-comments">
				<?php if ( have_comments() ) : ?>
					<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
						<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
							<div class="nav-links">
								<div class="nav-previous">
									<?php previous_comments_link( esc_html__('Older Comments', 'muiteer') ); ?>
								</div>
								<div class="nav-next">
									<?php next_comments_link( esc_html__('Newer Comments', 'muiteer') ); ?>
								</div>
							</div>
						</nav>
					<?php endif; ?>

					<ul id="comments-list">
						<?php
							wp_list_comments(
								array(
									'style' => 'ul',
									'short_ping' => true,
									'callback' => 'muiteer_comment'
								)
							);
						?>
					</ul>

					<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
						<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
							<div class="nav-links">
								<div class="nav-previous">
									<?php previous_comments_link( esc_html__('Older Comments', 'muiteer') ); ?>
								</div>
								<div class="nav-next">
									<?php next_comments_link( esc_html__('Newer Comments', 'muiteer') ); ?>
								</div>
							</div>
						</nav>
					<?php endif; ?>
				<?php else : ?>
					<?php muiteer_no_item_tips( esc_html__('This post doesn\'t have any comment. Be the first one!', 'muiteer') ); ?>
				<?php endif;
					if ( !comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments') ) : ?>
					<?php muiteer_no_item_tips( esc_html__('Comments are closed.', 'muiteer') ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
