<div class="footer-section">
  <div class="footer-gradient"></div>
  <footer>
    <div class="container-w m-auto">
      <div class="footer-block row">
        <?php
        $settings = '';
        if (get_locale() == 'en_GB') {
          $settings = 'settings-en';
        } elseif (get_locale() == 'ru_RU') {
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
          <div class="footer-block-inner row">
            <div class="footer-item-new col-6 col-lg-6 col-xl-3 order-2 order-lg-1">
              <p class="title"><?= get_field('map_title'); ?></p>
              <?php
              wp_nav_menu(
                [
                  'theme_location' => 'footer',
                  'menu_class' => 'nav-footer',
                  'container' => false,
                  'menu_id' => ''
                ]
              );
              ?>
            </div>
            <div class="footer-item-new col-6 col-lg-6 col-xl-3 order-lg-2 order-3">
              <p class="title"><?= get_field('join_us_title'); ?></p>
              <?php
              $soc_links = get_field('soc_list');
              foreach ($soc_links as $item) {
              ?>
                <a href="<?= $item['soc_link']; ?>" class="soc-link">
                  <?= $item['soc_name']; ?>
                <?php
              }
                ?>
                </a>
            </div>
            <div class="footer-item-new col-12 col-lg-6 col-xl-3 order-lg-3 order-4">
              <p class="title"><?= get_field('footer_contacts'); ?></p>
              <div class="footer-contats">
                <a href="tel:<?= get_field('tel_contact'); ?>" class="contacts-link ph-number">
                  <?= get_field('tel_contact'); ?>
                </a>
                <a href="mailto:<?= get_field('mail_contact'); ?>" class="contacts-link">
                  <?= get_field('mail_contact'); ?>
                </a>
                <p class="contacts-link"><?= get_field('address_contact'); ?></p>
              </div>
            </div>
            <div class="footer-block-side footer-item-new col-12 col-lg-6 col-xl-3 order-1 order-lg-4">
              <button id="scrollToTopBtn" class="back-top title justify-content-xl-end">
                <?= get_field('arrow_btn_text'); ?>
                <!-- <img src="<?= get_field('arrow_img'); ?>" alt="arrow"> -->

                <svg width="14" height="21" viewBox="0 0 14 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.94814 21L6.94814 1M6.94814 1L13.293 6.55173M6.94814 1L0.999865 6.55173" stroke="white" />
                </svg>

              </button>
            </div>
          </div>


      </div>
      <div class="footer-block">
        <!-- <a href="/">
                    <img src="<?= get_field('footer_logo'); ?>" alt="yurt-logo" class="footer-logo">
                </a> -->
        <p class="cop mt-3">Copyright @ Yurt Taslama 2024</p>
      </div>
    <?php
        }
        wp_reset_postdata();
    ?>
    </div>
  </footer>
  <!--  <div class="circle-gradient mx-auto d-flex justify-content-center align-items-start">-->

</div>
<?php wp_footer(); ?>

</body>

</html>