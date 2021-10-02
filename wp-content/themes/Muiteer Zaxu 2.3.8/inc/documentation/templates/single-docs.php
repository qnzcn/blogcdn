<?php
/**
 * The template for displaying a single doc
 *
 * To customize this template, create a folder in your current theme named "muiteerdocs" and copy it there.
 *
 * @package muiteerDocs
 */

$skip_sidebar = (get_post_meta($post->ID, 'skip_sidebar', true) == 'yes') ? true : false;

get_header(); ?>

    <?php
        /**
         * @since 2.3.0
         *
         * @hooked muiteerdocs_template_wrapper_start - 10
         */
        do_action('muiteerdocs_before_main_content');
    ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="muiteerdocs-single-wrap">
            <?php if (!$skip_sidebar) { ?>
                <?php muiteerdocs_get_template_part('docs', 'sidebar'); ?>
            <?php } ?>

            <div class="muiteerdocs-single-content">
                <?php muiteerdocs_breadcrumbs(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content" itemprop="articleBody">
                        <?php
                            the_content( sprintf(
                                /* translators: %s: Name of current post. */
                                wp_kses( __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'muiteer'), array( 'span' => array( 'class' => array() ) ) ),
                                the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ) );

                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . esc_html__('Docs:', 'muiteer'),
                                'after'  => '</div>',
                            ) );

                            $children = wp_list_pages("title_li=&order=menu_order&child_of=". $post->ID ."&echo=0&post_type=" . $post->post_type);

                            if ($children) {
                                echo '<div class="article-child well">';
                                    echo '<h3>' . __('Articles', 'muiteer') . '</h3>';
                                    echo '<ul>';
                                        echo $children;
                                    echo '</ul>';
                                echo '</div>';
                            }

                            $tags_list = muiteerdocs_get_the_doc_tags($post->ID, '', ', ');

                            if ($tags_list) {
                                printf('<span class="tags-links">' .  $tags_list . '</span>');
                            }
                        ?>
                    </div>

                    <footer class="entry-footer muiteerdocs-entry-footer">
                        <?php if (get_theme_mod('muiteer_doc_email_feedback', 'enabled') == 'enabled'): ?>
                            <span class="muiteerdocs-help-link">
                                <i class="muiteerdocs-icon muiteerdocs-icon-envelope"></i>
                                <?php printf( '%s <a id="muiteerdocs-stuck-modal" href="%s">%s</a>', __('Still stuck?', 'muiteer'), '#', __('How can we help?', 'muiteer') ); ?>
                            </span>
                        <?php endif; ?>

                        <div class="muiteerdocs-article-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                            <meta itemprop="name" content="<?php echo get_the_author(); ?>" />
                            <meta itemprop="url" content="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>" />
                        </div>

                        <meta itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"/>
                        <time itemprop="dateModified" datetime="<?php echo esc_attr( get_the_modified_date('c') ); ?>"><?php printf( __('Updated on %s', 'muiteer'), get_the_modified_date() ); ?></time>
                    </footer>

                    <?php if (get_theme_mod('muiteer_doc_navigation', 'enabled') == 'enabled'): ?>
                        <?php muiteerdocs_doc_nav(); ?>
                    <?php endif; ?>

                    <?php if (get_theme_mod('muiteer_doc_helpful_feedback', 'enabled') == 'enabled'): ?>
                        <?php muiteerdocs_get_template_part('content', 'feedback'); ?>
                    <?php endif; ?>

                    <?php if (get_theme_mod('muiteer_doc_email_feedback', 'enabled') == 'enabled'): ?>
                        <?php muiteerdocs_get_template_part('content', 'modal'); ?>
                    <?php endif; ?>

                </article>
            </div>

            <?php muiteer_quick_button(); ?>
        </div>

    <?php endwhile; ?>

    <?php
        /**
         * @since 2.3.0
         *
         * @hooked muiteerdocs_template_wrapper_end - 10
         */
        do_action('muiteerdocs_after_main_content');
    ?>

<?php get_footer(); ?>
