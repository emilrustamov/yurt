<?php
/*
Template Name: Contacts
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
<style>
    #form-message {
    transition: opacity 1s ease-in-out;
}

#form-message.fade-out {
    opacity: 0;
}
</style> 

<div class="container-w contact-block">
    <div class="contact-block-item">
        <h1 class="contact-title anim-lr">
            <span class="mainh-title mb-xl-5 mb-lg-3 mb-3"><?= get_field('page_title_frst'); ?></span>
            <span class="mainh-subtitle"><?= get_field('page_title_scnd'); ?></span>
        </h1>
        <div class="contact-items anima-bt">
            <p class="label label-contact"><?= get_field('tel_label'); ?></p>
            <a href="tel:<?= get_field('contact_number'); ?>" class="contacts-link">
                <?= get_field('contact_number'); ?>
            </a>
            <p class="label label-contact"><?= get_field('mail_label'); ?></p>
            <a href="mailto:<?= get_field('contact_mail'); ?>" class="contacts-link">
                <?= get_field('contact_mail'); ?>
            </a>
            <p class="label label-contact"><?= get_field('add_label'); ?></p>
            <p class="contacts-link"><?= get_field('contact_address'); ?></p>
        </div>
    </div>
    <div class="contact-block-item  anima-rl">
<?php
// Проверяем наличие GET-параметра "status"
if (isset($_GET['status'])) {
    $status = sanitize_text_field($_GET['status']); // Очистка входного параметра

    if ($status == 'success') {
        echo "<div id='form-message' style='display: block; color: green;'>Спасибо за заявку, с вами свяжется наш менеджер.</div>";
    } elseif ($status == 'error') {
        echo "<div id='form-message' style='display: block; color: red;'>Ошибка: не удалось отправить заявку. Попробуйте снова.</div>";
    } elseif ($status == 'captcha_error') {
        echo "<div id='form-message' style='display: block; color: red;'>Ошибка: неверная проверка reCAPTCHA. Попробуйте снова.</div>";
    } elseif ($status == 'captcha_empty') {
        echo "<div id='form-message' style='display: block; color: red;'>Ошибка: reCAPTCHA не заполнена.</div>";
    }
}
?>



<script src="https://www.google.com/recaptcha/api.js" async defer></script>





        <form method="post" class="contact-form" action="">
            <label for="name"><?= get_field('name_label'); ?></label>
			 <input type="text" name="honeypot" value="" style="display:none;">
            <input type="text" id="name" name="name" placeholder="<?= get_field('name_placeholder'); ?>" required>

            <label for="email"><?= get_field('mailfield_label'); ?></label>
            <input type="email" id="email" name="email" placeholder="<?= get_field('mail_placeholder'); ?>" required>

            <label for="telnum"><?= get_field('telfield_label'); ?></label>
            <input type="tel" id="telnum" name="telnum" placeholder="<?= get_field('tel_placeholder'); ?>">

            <label for="message"><?= get_field('message_label'); ?></label>
            <textarea name="message" id="message" placeholder="<?= get_field('message_placeholder'); ?>" required></textarea>
            <!-- <button type="submit" class="form-btn btn-primary btn-more d-flex align-items-center" name="contactSubmit"><?= get_field('btn_txt'); ?> -->
 <div class="g-recaptcha" data-sitekey="6Lez0WIqAAAAAPa9HMYR4aCAB1_ERLblwrxq3ATc"></div>
            <button type="submit" class="btn-primary btn-more d-flex align-items-center text-uppercase justify-content-end" name="contactSubmit"><?= get_field('btn_txt'); ?> 
                <span class="px-3 svg-cust">
                    <div class="arrow-tail"></div>
                    <svg width="66" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 17.5519H98M98 17.5519L82.5517 35.207M98 17.5519L82.5517 1.00013" stroke="white" stroke-width="2" />
                    </svg>
                </span>
            </button>
			
        </form>
		<script>
    // Удаление параметра "status" из URL после загрузки страницы
    if (window.location.search.indexOf('status=') !== -1) {
        const url = new URL(window.location.href);
        url.searchParams.delete('status');
        window.history.replaceState(null, null, url);
    }

    // Таймер для плавного исчезновения сообщения
    const formMessage = document.getElementById('form-message');
    if (formMessage) {
        setTimeout(() => {
            formMessage.classList.add('fade-out');
        }, 4000); // Начать исчезновение через 4 секунды

        setTimeout(() => {
            formMessage.style.display = 'none';
        }, 5000); // Полностью скрыть через 5 секунд
    }

    // Проверка наличия reCAPTCHA перед отправкой формы
    document.querySelector('.contact-form').addEventListener('submit', function (e) {
        if (grecaptcha.getResponse() === '') {
            e.preventDefault();
            alert('Пожалуйста, подтвердите, что вы не робот.');
        }
    });
</script>


    </div>
</div>
<!-- <div class="back-circle anima-tb">
    <div class="blue-item contact-blue contact-blue-animation"></div>
    <div class="black-item contact-black"></div>
</div> -->
<?php get_footer(); ?>