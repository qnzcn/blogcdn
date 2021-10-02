<?php
get_header();
?>
<div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-area">
          <main class="site-main">
            <?php if ( have_posts() ) : ?>
              <?php if ( is_home() ) : ?>
                <!-- <h1 class="latest-title">最新文章</h1> -->
                <h3 class="section-title"><span><i class="fa fa-list-alt"></i> 最新文章</span></h3>
              <?php endif; ?>
              <div class="row posts-wrapper">
                <?php while ( have_posts() ) : the_post();
                  get_template_part( 'parts/template-parts/content', _cao( 'latest_layout', 'grid' ) );
                endwhile; ?>
              </div>
              <?php get_template_part( 'parts/pagination' ); ?>
            <?php else : ?>
              <?php get_template_part( 'parts/template-parts/content', 'none' ); ?>
            <?php endif; ?>
          </main>
        </div>
      </div>
    </div>
</div>

<?php
wp_reset_postdata();
get_footer();
