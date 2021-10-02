<style type="text/css">
.article-content .entry-downbox{
position: relative;
    padding: 0;
    background-color: #f6f6f6;
    margin: 0 -15px;
    -webkit-box-shadow: 0 34px 20px -30px rgba(1, 0, 0, 0.15);
    box-shadow: 0 34px 20px -30px rgba(1, 0, 0, 0.15);
}

.article-content .entry-downbox .entry-title{
font-size: 1.075em;
    font-weight: 600;
    letter-spacing: 0.5px;
    padding-bottom: 10px;
    margin-bottom: 10px;
    border-bottom: 1px dashed #ccc;
    padding-top: 10px;
}

</style>

<div class="container">
  <div class="entry-downbox">
  <div class="row d-flex">
    <div class="col-4">
      <img class="lazyload" data-src="<?php echo esc_url(_get_post_timthumb_src()); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="<?php echo get_the_title(); ?>">  
    </div>

    <div class="col-8">
      <?php echo cao_entry_header( array( 'tag' => 'h1', 'link' => false) );?>
      <a target="_blank" href="https://www.loowp.com/" class="btn btn--primary mt-10">立即购买</a>
      <a target="_blank" href="https://www.loowp.com/" class="btn btn--secondary mt-10">立即下载</a>
    </div>  
  </div>
  </div>
</div>