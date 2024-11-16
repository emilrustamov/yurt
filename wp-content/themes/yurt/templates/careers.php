<?php
/*
Template Name: Careers
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
<main>
  <section class="container-w mx-auto anim-lr pb-1 mt-3" style="position: relative;">
    <div class="row d-flex content">
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 d-flex flex-column justify-content-start align-items-start">
        <h1 class="mainh-title pb-3"><?= the_title(); ?></h1>
        <p style="line-height: 22px;">
          <?= get_field('page_description'); ?>
        </p>
      </div>
    </div>
  </section>
  <section class="container-w mx-auto">


    <div class="vacancy-accordion">
      <div class="accordion anima-bt" id="accordionExample">
        <?php
        $vacancies = get_field('vacancy_list');
        foreach ($vacancies as $index => $vacancy) {
        ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= $index; ?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index; ?>" aria-expanded="false" aria-controls="collapse<?= $index; ?>">
                <?= $vacancy['vacancy_name']; ?>
              </button>
            </h2>
            <div id="collapse<?= $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $index; ?>" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="acc-line"></div>
                <p style="font-size: 14px;font-weight 700;"><?= $vacancy['vacancy_subtitle']; ?></p>
                <ul style="list-style:disc;">
                  <?php
                  $skills_list = $vacancy['skills_list'];
                  foreach ($skills_list as $skill) {
                  ?>
                    <li><?= $skill['skill_item'] ?></li>
                  <?php } ?>
                </ul>
                <p style="font-size: 14px;font-weight 700;"><?= $vacancy['vacancy_description']; ?></p>
              </div>
            </div>
          </div>
          <div class="acc-underline"></div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>


  <section class="container-w intern-block" style="position: relative;">
    <div class="row d-flex">
      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 d-flex flex-column justify-content-start align-items-start pb-3">
        <h1 class="mainh-title pb-3"><?= get_field('secondary_block_title'); ?></h1>
        <p style="line-height: 22px;">
          <?= get_field('intern_desk'); ?>
        </p>
      </div>
    </div>
  </section>
  <div class="container-w m-auto">
    <div class="vacancy-form-block">

      <?php
      if (isset($_GET['status'])) {
        $status = sanitize_text_field($_GET['status']);

        if ($status == 'success') {
          echo "<div id='form-message' style='display: block; color: green;'>Спасибо за заявку, с вами свяжется наш менеджер.</div>";
        } elseif ($status == 'error') {
          echo "<div id='form-message' style='display: block; color: red;'>Ошибка: не удалось отправить заявку. Попробуйте снова.</div>";
        } elseif ($status == 'captcha_error') {
          echo "<div id='form-message' style='display: block; color: red;'>Ошибка: неверная проверка reCAPTCHA. Попробуйте снова.</div>";
        } elseif ($status == 'captcha_empty') {
          echo "<div id='form-message' style='display: block; color: red;'>Ошибка: reCAPTCHA не заполнена.</div>";
        } elseif ($status == 'bot_detected') {
          echo "<div id='form-message' style='display: block; color: red;'>Ошибка: Обнаружен бот.</div>";
        }
      }
      ?>


      <form method="post" class="vacancy-form" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6">
            <label for="name-v"><?= get_field('name_label_vacancy'); ?></label>
            <input type="text" id="name-v" name="name-v" placeholder="<?= get_field('name_placeholder_vacancy'); ?>" required>
          </div>
          <div class="col-lg-6">
            <label for="surname-v"><?= get_field('surname_label_vacancy'); ?></label>
            <input type="text" id="surname-v" name="surname-v" placeholder="<?= get_field('surname_placeholder_vacancy'); ?>">
          </div>



          <div class="col-lg-6">
            <label for="email-v"><?= get_field('mailfield_label_vacancy'); ?></label>
            <input type="email" id="emai-vl" name="email-v" placeholder="<?= get_field('mail_placeholder_vacancy'); ?>" required>
          </div>
          <div class="col-lg-6">
            <label for="telnum-v"><?= get_field('telfield_label_vacancy'); ?></label>
            <input type="tel" id="telnum-v" name="telnum-v" placeholder="<?= get_field('tel_placeholder_vacancy'); ?>">
          </div>



          <div class="col-lg-6">
            <label for="message-v"><?= get_field('message_label_vacancy'); ?></label>
            <textarea name="message-v" id="message-v" placeholder="<?= get_field('message_placeholder_vacancy'); ?>" required></textarea>
          </div>
          <div class="col-lg-6">

            <div class="file-drop-zone" id="file-drop-zone">
              <label for=""><?= get_field('portfolio_label_vacancy'); ?></label>
              <input type="file" name="file[]" id="file" accept="" class="inputfile" data-multiple-caption="{count} files selected" multiple="true">
              <label for="file"><span class="file-drop draglabel"><?= get_field('portfolio_placeholder_vacancy'); ?></span></label>
            </div>

            <div class="file-drop-zone-scnd" id="file-drop-zone-scnd">
              <label for="" class="last-label"><?= get_field('files_label_vacancy'); ?></label>
              <input type="file" name="file-v[]" id="file-v" accept="" class="inputfile" data-multiple-caption="{count} files selected" multiple="true">
              <label for="file-v"><span class="file-drop draglabel"><?= get_field('files_placeholder_vacancy'); ?></span></label>
            </div>
            <div class="g-recaptcha mt-3" data-sitekey="6Lez0WIqAAAAAPa9HMYR4aCAB1_ERLblwrxq3ATc"></div>
            <input type="text" name="honeypot-vacancy" value="" style="display:none;">
            <button type="submit" class="mt-5 btn-primary btn-more d-flex align-items-center text-uppercase justify-content-end" name="vacancySubmit" style="float: right;"><?= get_field('btn_txt_vacancy'); ?>
              <span class="px-3 svg-cust">
                <div class="arrow-tail"></div>
                <svg width="66" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 17.5519H98M98 17.5519L82.5517 35.207M98 17.5519L82.5517 1.00013" stroke="white" stroke-width="2" />
                </svg>
              </span>
            </button>
          </div>
        </div>
      </form>
      <script>
        // Проверка наличия reCAPTCHA перед отправкой формы
        document.querySelector('.vacancy-form').addEventListener('submit', function(e) {
          if (grecaptcha.getResponse() === '') {
            e.preventDefault(); // Останавливаем отправку формы
            alert('Пожалуйста, подтвердите, что вы не робот.'); // Выводим предупреждение
          }
        });
      </script>
    </div>
  </div>
</main>



<?php get_footer(); ?>