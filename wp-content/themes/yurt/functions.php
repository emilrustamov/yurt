<?php 
add_action('wp_enqueue_scripts', 'add_scripts_and_styles', 100);
add_action('after_setup_theme', 'add_menu');

function add_scripts_and_styles()
{
    wp_enqueue_script('jquery', '/wp-includes/js/jquery/jquery.min.js', null, null, true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('boostrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), null, true);
    wp_enqueue_script('gallery', get_template_directory_uri() . '/assets/js/gallery_slider.js', array('jquery'), null, true);
    wp_enqueue_script('popup', get_template_directory_uri() . '/assets/js/work_popup.js', array('jquery'), null, true);
    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/theme.css');
    wp_enqueue_style('slickcss', get_template_directory_uri() . '/assets/css/slick.css');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style('customstylen', get_template_directory_uri() . '/assets/css/custom-n.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
    wp_enqueue_style('bootstrapgrid', get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css');
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('owl', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
    if(is_page_template( 'templates/careers.php' )){
        wp_enqueue_script('vanillaCustom', get_template_directory_uri() . '/assets/js/dropfiles.js', null, null, true);
    }
}
function add_menu()
{
    register_nav_menu('main', 'Main menu');
    register_nav_menu('footer', 'Footer menu');
}

if (isset($_POST['contactSubmit'])) {
    // Переменная для сообщения
    $message = '';

    // Honeypot проверка
    if (!empty($_POST['honeypot'])) {
        $message = "Ошибка: Выявлен бот. Попробуйте снова.";
    } else {
        // Проверка reCAPTCHA
        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $recaptcha_secret = '6Lez0WIqAAAAAPJJJTE7TQxVykt39Fguj1HN-233';
            $recaptcha_response = $_POST['g-recaptcha-response'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
            $response_keys = json_decode($response, true);

            if ($response_keys["success"]) {
                // Попробуем отправить письмо
                if (send_email($_POST['name'], $_POST['email'], $_POST['telnum'], $_POST['message'])) {
                    // Перенаправляем на ту же страницу с GET параметром "success"
                    wp_redirect(add_query_arg('status', 'success', $_SERVER['REQUEST_URI']));
                    exit();
                } else {
                    // Перенаправляем на ту же страницу с GET параметром "error"
                    wp_redirect(add_query_arg('status', 'error', $_SERVER['REQUEST_URI']));
                    exit();
                }
            } else {
                // Перенаправляем на ту же страницу с GET параметром "captcha_error"
                wp_redirect(add_query_arg('status', 'captcha_error', $_SERVER['REQUEST_URI']));
                exit();
            }
        } else {
            // Перенаправляем на ту же страницу с GET параметром "captcha_empty"
            wp_redirect(add_query_arg('status', 'captcha_empty', $_SERVER['REQUEST_URI']));
            exit();
        }
    }
}



function send_email(string $name, string $mail, string $tel, string $message)
{
    $to = "info@yurt.studio"; // Замените на адрес получателя
    $subject = 'Yurt Studio'; // Тема письма
    $message_content = "<div>
        <p>Email: " . esc_html($mail) . "</p>
        <p>Name: " . esc_html($name) . "</p>
        <p>Tel. num: " . esc_html($tel) . "</p>
        <p>Message: " . nl2br(esc_html($message)) . "</p>
    </div>";
    $headers = array('Content-Type: text/html; charset=UTF-8'); // Заголовки письма

    // Отправка письма
    return wp_mail($to, $subject, $message_content, $headers);
}



if (isset($_POST['vacancySubmit'])) {
    // Honeypot проверка
    if (!empty($_POST['honeypot-vacancy'])) {
        wp_redirect(add_query_arg('status', 'bot_detected', $_SERVER['REQUEST_URI']));
        exit();
    }

    // Проверка reCAPTCHA
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $recaptcha_secret = '6Lez0WIqAAAAAPJJJTE7TQxVykt39Fguj1HN-233';

        $recaptcha_response = $_POST['g-recaptcha-response'];
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response);
        $response_keys = json_decode($response, true);

        if ($response_keys["success"]) {
            // Работа с файлами
            $tmps_name = $_FILES["file"]["tmp_name"];
            $files_name = $_FILES["file"]["name"];
            $tmps_name2 = $_FILES["file-v"]["tmp_name"];
            $files_name2 = $_FILES["file-v"]["name"];

            if (send_email_vac($_POST['name-v'], $_POST['email-v'], $_POST['surname-v'], $_POST['telnum-v'], $_POST['message-v'], $tmps_name, $files_name, $tmps_name2, $files_name2)) {
                // Если отправка успешна
                wp_redirect(add_query_arg('status', 'success', $_SERVER['REQUEST_URI']));
                exit();
            } else {
                // Если произошла ошибка при отправке письма
                wp_redirect(add_query_arg('status', 'error', $_SERVER['REQUEST_URI']));
                exit();
            }
        } else {
            // Ошибка в reCAPTCHA
            wp_redirect(add_query_arg('status', 'captcha_error', $_SERVER['REQUEST_URI']));
            exit();
        }
    } else {
        // reCAPTCHA не заполнена
        wp_redirect(add_query_arg('status', 'captcha_empty', $_SERVER['REQUEST_URI']));
        exit();
    }
}



function send_email_vac(string $name, string $mail, string $surname, string $tel, string $message, array $tmps_name, array $files_name, array $tmps_name2, array $files_name2)
{
    $upload_dir = wp_upload_dir();
    $attachments = array();

    // Цикл для первого набора файлов
    for ($i = 0; $i < count($files_name); $i++) {
        $destination = sys_get_temp_dir() . '/' . $files_name[$i];
        if (move_uploaded_file($tmps_name[$i], $destination)) {
            $attachments[] = $destination;
        }
    }

    // Цикл для второго набора файлов
    for ($e = 0; $e < count($files_name2); $e++) {
        $destination2 = sys_get_temp_dir() . '/' . $files_name2[$e];
        if (move_uploaded_file($tmps_name2[$e], $destination2)) {
            array_push($attachments, $destination2);
        }
    }

    $to = "info@yurt.studio"; // Замените на адрес получателя
    $subject = 'Yurt Studio'; // Тема письма
    $message_content = "<div>
        <p>Name: " . esc_html($name) . "</p> 
        <p>Surname: " . esc_html($surname) . "</p> 
        <p>Email: " . esc_html($mail) . "</p> 
        <p>Phone number: " . esc_html($tel) . "</p> 
        <p>Message: " . esc_html($message) . "</p>
    </div>";
    $headers = array('Content-Type: text/html; charset=UTF-8'); // Заголовки письма

    // Отправка письма
    if (wp_mail($to, $subject, $message_content, $headers, $attachments)) {
        foreach ($attachments as $file) {
            unlink($file); // Удаление загруженных файлов после успешной отправки
        }
        return true; // Отправка успешна
    } else {
        foreach ($attachments as $file) {
            unlink($file); // Удаление загруженных файлов в случае ошибки
        }
        return false; // Ошибка при отправке
    }
}



?>