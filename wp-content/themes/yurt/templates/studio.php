<?php
/*
Template Name: Studio
*/
get_header(); ?>
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
<main class="studio-pg">

  <section class="container-w mx-auto anim-lr" style="position: relative;">
    <div class="row d-flex content">
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-start align-items-start">
        <div class="col-lg-5 col-md-3 col-sm-6 col-12 pb-4">
          <!-- <h1 class="mainh-subtitle"><?= get_field('page_title'); ?></h1> -->
          <h1 class="contacts-title">
            <div class="mainh-subtitle mb-xl-5 mb-lg-3 mb-3"><?= get_field('page_title_frst'); ?></div>
            <div class="mainh-title"><?= get_field('page_title_scnd'); ?></div>
          </h1>
        </div>
      </div>
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
        <p>
          <!-- <?= get_field('page_description'); ?> -->
          <?php
          if (get_field('text_description')) {
          ?>
        <div class="page-desk-ust-txt">
          <?= get_field('text_description'); ?>
        </div>
      <?php
          }
      ?>
      </p>
      </div>
    </div>
  </section>
  <section style="position: relative;" class="anima-bt">
    <!-- <div class="gradien-stick" style="position: absolute;z-index: 2;top: 0;width: 15%;height: 100%;background: linear-gradient(90deg, black 15%, rgb(0 0 0 / 0%) 100%);left:0;"> -->
    <div class="gradien-stick">
    </div>
    <div class="gradien-stick">
      <!-- <div class="gradien-stick" style="position: absolute;z-index: 2;top: 0;width: 15%;height: 100%;background: linear-gradient(270deg, black 20%, rgb(0 0 0 / 0%) 100%);right:0;"> -->
    </div>
    <div class="gallery-slider owl-carousel mt-5">
      <?php
      $studio_images = get_field('studio_img_list');
      foreach ($studio_images as $image) {
      ?>
        <img src="<?= $image['studio_img']; ?>" alt="studi-logo" srcset="">

      <?php
      }
      ?>
    </div>
  </section>

  <section class="container-w mx-auto mt-5">
    <div class="col-12">
      <h2 class="pb-3 pb-4 text-uppercase"><?= get_field('secondary_block_title'); ?></h2>
    </div>
    <?php $showreel_list = get_field('showreel_list'); ?>
    <div class="showreels-slider owl-carousel">
      <?php foreach ($showreel_list as $index => $showreel) { ?>
        <div class="video-container">
          <video id="custom-video" class="video" preload="none" poster="<?= $showreel['showreel_img'] ? $showreel['showreel_img'] : '/wp-content/uploads/2024/08/poster.png'; ?>">
            <source src="<?= $showreel['showreel_video_link']; ?>" type="video/mp4">
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
      <?php } ?>
    </div>
    <div class="showreel-filter col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12 mx-auto d-flex py-3">
      <div class="arrow-prev">
      <i class="fa fa-chevron-left"></i>
      </div>
      <div class="showreels-nav-wrapper">
        <div class="showreels-nav owl-carousel">
          <?php foreach ($showreel_list as $index => $showreel) { ?>
            <p class="showreels-nav-item text-align-center <?= $index == 0 ? 'active' : ''; ?>" data-index="<?= $index; ?>" data-year="<?= $showreel['showreel_year']; ?>"><?= $showreel['showreel_year']; ?></p>
          <?php } ?>
        </div>
      </div>
      <div class="arrow-next">
      <i class="fa fa-chevron-right"></i>
      </div>
    </div>
  </section>



  <!-- <section style="position: relative;">
        <div class="gradien-stick" style="position: absolute;z-index: 2;top: 0;width: 15%;height: 100%;background: linear-gradient(90deg, black 15%, rgb(0 0 0 / 0%) 100%);left:0;">
        </div>
        <div class="gradien-stick" style="position: absolute;z-index: 2;top: 0;width: 15%;height: 100%;background: linear-gradient(270deg, black 20%, rgb(0 0 0 / 0%) 100%);right:0;">
        </div>
        <div class="partners-slider owl-carousel">
            <?php
            $partners = get_field('partner_list');
            foreach ($partners as $partner) {
            ?>
                <img src="<?= $partner['partner_logo']; ?>" alt="partner-logo" srcset="">
            <?php
            }
            ?>
        </div>
    </section> -->
  <div class="load-more-btn mt-5">
    <a href="<?= home_url(); ?>/<?= get_field('more_link'); ?>"><button class="btn-primary btn-more d-flex align-items-center d-xs-none text-uppercase">
        <span class="btn-text"><?= get_field('more_label'); ?></span>
        <span class="px-3 svg-cust">
          <div class="arrow-tail"></div>
          <svg width="66" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 17.5519H98M98 17.5519L82.5517 35.207M98 17.5519L82.5517 1.00013" stroke="white" stroke-width="2" />
          </svg>
        </span>
      </button>
    </a>
  </div>
</main>

<script type="text/javascript" src="/wp-content/themes/yurt/assets/js/videoplayer.js"></script>
<?php get_footer(); ?>