<?php
/*
Template Name: Works
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
<main class="works-pg">
    <div class="container-w mx-auto content" style="position: relative;">
        <!-- <section class="anim-lr row">
            <div class="col-lg-6 pb-4">
                <h1 class="mainh-subtitle yellow"><?= the_title(); ?></h1>
            </div>
            <p id="subtitle" class="col-lg-6"><?= get_field('page_description'); ?></p>
           <p id="subtitle" class="hidden-title" style="visibility: hidden;"></p> 
        </section> -->
        <section class="anima-bt">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2  p-card work-card-list" id="worksContainer">
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
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 work-card-block">
                        <div class="work-card">
                            <img class="img-fluid" src="<?= get_field('work_cover'); ?>" alt="wor-img" srcset="">
                            <!-- <div class="works-title h-50 w-100 d-flex flex-column justify-content-end">
                                <h2 class="work-description"><?= the_title(); ?></h2>
                            </div> -->
                            <div>
                                <h2 class="work-description-new"><?= the_title(); ?></h2>
                            </div>
                        </div>
                        <!-- card end  -->
                        <!-- modal start  -->
                        <div class="modal fade workModal">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
<!--                                         <h2 class="modal-title pt-3 pb-3" id="modalDescription"><?= the_title(); ?></h2> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- modal-body start -->
                                    <div class="modal-body">
                                        <div class="video-container">
                                            <video id="custom-video" class="video" preload="none" poster="<?= get_field('work_cover'); ?>">
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
                                        <div class="row justify-content-between pb-3">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
												 <h4 class="modal-title pt-3 pb-3" id="modalDescription"><?= the_title(); ?></h4>
                                                <p class="light-gray-title"><?= get_field('desk_label'); ?></p>
												<p class="light-gray-title"><?= get_field('project_date'); ?></p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <p class="pt-3"><?= the_content(); ?></p>
                                            </div>
                                        </div>
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
            <div class="load-more-btn">
                <a href="#" data-glm-button-selector=".anima-bt" class="btn loadMoreBtn m-auto"><button class="btn-primary btn-more d-flex align-items-center d-xs-none">
                        <span class="btn-text"><?= get_field('more_label'); ?></span>
                        <span class="icon mx-3">&rarr;</span>
                    </button>
                </a>
            </div>
        </section>
    </div>

</main>
<script type="text/javascript" src="/wp-content/themes/yurt/assets/js/videoplayer.js"></script>

<?php get_footer(); ?>