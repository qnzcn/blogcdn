<?php
$name = $email = '';

if ( is_user_logged_in() ) {
    $user  = wp_get_current_user();
    $name  = $user->display_name;
    $email = $user->user_email;
}
?>
<div id="muiteerdocs-contact-modal" class="muiteerdocs-contact-modal">
    <div class="muiteerdocs-modal-header">
        <h1><?php _e('How can we help?', 'muiteer'); ?></h1>
        <a href="#" id="muiteerdocs-modal-close" class="muiteerdocs-modal-close"><i class="muiteerdocs-icon muiteerdocs-icon-times"></i></a>
    </div>

    <div class="muiteerdocs-modal-body">
        <form id="muiteerdocs-contact-modal-form" action="" method="post">
            <div class="muiteerdocs-form-row">
                <label for="name"><?php _e('Name', 'muiteer'); ?></label>

                <div class="muiteerdocs-form-field">
                    <input type="text" name="name" id="name" placeholder="" value="<?php echo $name; ?>" required />
                </div>
            </div>

            <div class="muiteerdocs-form-row">
                <label for="name"><?php _e('Email', 'muiteer'); ?></label>

                <div class="muiteerdocs-form-field">
                    <input type="email" name="email" id="email" placeholder="you@example.com" value="<?php echo $email; ?>" <?php disabled( is_user_logged_in() ); ?> required />
                </div>
            </div>

            <div class="muiteerdocs-form-row">
                <label for="name"><?php _e('Subject', 'muiteer'); ?></label>

                <div class="muiteerdocs-form-field">
                    <input type="text" name="subject" id="subject" placeholder="" value="" required />
                </div>
            </div>

            <div class="muiteerdocs-form-row">
                <label for="name"><?php _e('Message', 'muiteer'); ?></label>

                <div class="muiteerdocs-form-field">
                    <textarea type="message" name="message" id="message" required></textarea>
                </div>
            </div>

            <div class="muiteerdocs-form-action">
                <input type="submit" name="submit" value="<?php echo esc_attr_e('Send', 'muiteer'); ?>">
                <input type="hidden" name="doc_id" value="<?php the_ID(); ?>">
                <input type="hidden" name="action" value="muiteerdocs_contact_feedback">
            </div>
        </form>
    </div>
</div>