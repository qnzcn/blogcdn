<?php global $post; ?>

<div class="muiteerdocs-feedback-wrap">
    <?php
    $positive = (int) get_post_meta($post->ID, 'positive', true);
    $negative = (int) get_post_meta($post->ID, 'negative', true);

    $positive_title = $positive ? sprintf( _n('%d person found this useful', '%d persons found this useful', $positive, 'muiteer'), number_format_i18n($positive) ) : __('No votes yet', 'muiteer');
    $negative_title = $negative ? sprintf( _n('%d person found this not useful', '%d persons found this not useful', $negative, 'muiteer'), number_format_i18n($negative) ) : __('No votes yet', 'muiteer');
    ?>

    <?php _e('Was this article helpful to you?', 'muiteer'); ?>

    <span class="vote-link-wrap">
        <a href="#" class="muiteerdocs-tip positive" data-id="<?php the_ID(); ?>" data-type="positive" title="<?php echo esc_attr($positive_title); ?>">
            <?php _e('Yes', 'muiteer'); ?>

            <?php if ($positive) { ?>
                <span class="count"><?php echo number_format_i18n($positive); ?></span>
            <?php } ?>
        </a>
        <a href="#" class="muiteerdocs-tip negative" data-id="<?php the_ID(); ?>" data-type="negative" title="<?php echo esc_attr($negative_title); ?>">
            <?php _e( 'No', 'muiteer' ); ?>

            <?php if ($negative) { ?>
                <span class="count"><?php echo number_format_i18n($negative); ?></span>
            <?php } ?>
        </a>
    </span>
</div>