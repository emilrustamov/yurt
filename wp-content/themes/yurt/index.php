<?php
/*
Template Name: Home
*/
get_header(); ?>
<style>
  header {
    position: absolute;
    top: 0;
    left: 0;
  }
</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NNQE2PL1C2"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-NNQE2PL1C2');
</script>
<main>
  <section class="hero-section w-100">
    <div class="hero-main-block anima-tb">
      <video class="hero-video" id="vid" poster="<?= get_field('video_preview'); ?>" autoplay muted playsinline loop>
        <source src="<?= get_field('short_video_link'); ?>" type="video/mp4">
      </video>
      <div style="position:absolute; bottom:0; left:0; right:0; top:0;">
        <div class="container-w m-auto" style="position:relative; height:100%">
          <div class="hero-content-block row align-content-end">
            <div class="col-lg-4 col-12 align-items-end order-lg-1 order-1 mb-lg-0 mb-3 p-0">
              <h1 class="heading-m"><?= get_field('hero_title'); ?></h1>
              <p class="anima-bt mt-3" style="line-height: 20px;"><?= get_field('hero_desc'); ?></p>
            </div>
            <div class="col-lg-4 order-lg-2 order-3 col-12 d-flex justify-content-lg-center justify-content-start align-items-end p-0">
              <button class="btn btn-outline-primary open-video-btn"><?= get_field('video_btn_label'); ?></button>
            </div>
            <div class="col-lg-4  col-12 d-flex align-items-end order-lg-3 order-2 d-none d-sm-block" style="visibility: hidden;">
              <p class="anima-bt"><?= get_field('hero_desc'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-w mx-auto">
      <h2 class="pt-5 text-uppercase"><?= get_field('secondary_block_title'); ?></h2>
      <section class="anima-bt">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2  p-card" id="worksContainer">
          <?php
          $works = '';
          if (get_locale() == 'en_GB') {
            $works = 'works-en';
          } elseif (get_locale() == 'ru_RU') {
            $works = 'works-ru';
          } else {
            $works = 'works-tm';
          }

          $posts = get_posts([
            'numberposts' => -1,
            'category_name' => $works,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => 'post',
            'suppress_filters' => true,
          ]);
          foreach ($posts as $post) {
            setup_postdata($post);
          ?>
            <!-- card start  -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 work-card-block" data-product-url="<?= get_permalink(); ?>">
              <div class="work-card d-flex flex-column">
                <img class="img-fluid" src="<?= get_field('work_cover'); ?>" alt="wor-img" srcset="">
                <h2 class="work-description-new"><?= the_title(); ?></h2>
              </div>
              <!-- card end  -->
              <!-- modal start  -->
              <div class="modal fade workModal">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
<!--                       <h2 class="modal-title" id="modalDescription"><?= the_title(); ?></h2> -->
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- modal-body start -->
                    <div class="modal-body">
                      <div class="video-container">
                        <video id="custom-video" class="video" poster="<?= get_field('work_cover'); ?>">
                          <source src="<?= get_field('work_video'); ?>">
                          Ваш браузер не поддерживает видео.
                        </video>
                        <div class="custom-controls">
                          <button class="play-pause"><i class="fa fa-play"></i></button>
                          <button class="rewind d-none d-sm-block"><i class="	fa fa-step-backward"></i></button>
                          <button class="forward d-none d-sm-block"><i class="fa fa-step-forward"></i></button>
                          <input type="range" class="timeline" min="0" max="100" value="0">
                          <button class="volume"><i class="fa fa-volume-up"></i></button>
                          <div class="volume-panel">
                            <input type="range" class="volume-control" min="0" max="1" step="0.1" value="1">
                          </div>
                          <button class="settings"><i class="fa fa-gear"></i></button>
                          <div class="speed-panel">
                            <button class="speed" data-speed="1">1x</button>
                            <button class="speed" data-speed="1.5">1.5x</button>
                            <button class="speed" data-speed="2">2x</button>
                          </div>
                          <button class="fullscreen"><i class="fa fa-window-maximize"></i></button>
                        </div>
                      </div>
					<h4 class="modal-title pt-3 pb-3" id="modalDescription"><?= the_title(); ?></h4>
                      <p class="light-gray-title mt-1"><?= get_field('desk_label'); ?></p>
					  <p class="light-gray-title mt-1"><?= get_field('project_date'); ?></p>
                      <p><?= the_content(); ?></p>
                    </div>
                    <!-- modal-body end -->
                  </div>
                  <!-- modal-content end  -->
                </div>
              </div>
            </div>
            <!-- modal end  -->

          <?php
          }
          wp_reset_postdata();
          ?>
          <!-- row end  -->
        </div>
      </section>
    </div>
    <div class="load-more-btn">
      <a href="<?= home_url(); ?>/<?= get_field('more_link'); ?>"><button class="btn-primary btn-more d-flex align-items-center d-xs-none">
          <span class="btn-text text-uppercase"><?= get_field('more_label'); ?></span>
          <span class="px-3 svg-cust">
            <div class="arrow-tail"></div>
            <svg width="66" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 17.5519H98M98 17.5519L82.5517 35.207M98 17.5519L82.5517 1.00013" stroke="white" stroke-width="2" />
            </svg>
          </span>
        </button>
      </a>
    </div>
  </section>
  <div class="fullscreen-video-container" id="fullscreenVideoContainer" style="display:none;">
    <?php
    $settings = '';
    if (get_locale() == 'en_GB') {
      $settings = 'settings-en';
    }
    if (get_locale() == 'ru_RU') {
      $settings = 'settings-ru';
    } else {
      $settings = 'settings-tm';
    }
    $posts = get_posts([
      'numberposts' => -1,
      'category_name' => $settings,
      'orderby' => 'date',
      'order' => 'DESC',
      'post_type' => 'post',
      'suppress_filters' => true,
    ]);
    foreach ($posts as $post) {
      setup_postdata($post);
    ?>
      <button class="close-video-btn">
        <img src="<?= get_field('video_icon_close'); ?>" alt="close-video">
      </button>
    <?php
    }
    wp_reset_postdata();
    ?>
    <video class="fullscreen-video" id="fullscreenVid" poster="<?= get_field('video_preview'); ?>" controls loop>
      <source src="<?= get_field('full_video_link'); ?>" type="video/mp4">
    </video>
  </div>

</main>
<script>
  document.getElementById('vid').play();
</script>
<script type="text/javascript" src="/wp-content/themes/yurt/assets/js/videoplayer.js"></script>



<?php get_footer(); ?>