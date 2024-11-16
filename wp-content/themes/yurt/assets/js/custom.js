jQuery(document).ready(function ($) {
    // Отображение popup при нажатии на заголовок проекта
    $(".work-card-block").click(function () {
		 var productUrl = $(this).data('product-url');
  
        if (event.which === 1) {
            // Левая кнопка мыши
            $(this).children(".workModal").modal("show");
        } else if (event.which === 2) {
            // Средняя кнопка мыши (колесо)
            window.open(productUrl, '_blank');
        }
       
    });
    // Конец
    // 
  
    // $(".work-card-block").hover(function () {
    //     $("#subtitle").css("visibility", "visible");
    // }, function () {
    //     $("#subtitle").css("visibility", "hidden");
    // });


    // При клике на кнопку прокручиваем страницу вверх
    $('#scrollToTopBtn').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 100);
        return false;
    });


//     $('.menu-icon').click(function () {
//         $('.mobile-menu-block').fadeIn();
//         $('.mobile-menu-block').animate({right:'0'}, 300);
//     });
//     $('.close-mobile').click(function () {
//         $('.mobile-menu-block').animate({right:'-100%'}, 300);
//         $('.mobile-menu-block').fadeOut();
//     });

//     $('.open-video-btn').click(function () {
//         $('.fullscreen-video-container').fadeIn();
//     });
//     $('.close-video-btn').click(function () {
//         $('.fullscreen-video-container').fadeOut(500);
//     });
	
// 	$('.open-video-btn').on('click', function(e) {
//         e.preventDefault();
//         $('#fullscreenVideoContainer').css('display', 'flex');
//         $('#fullscreenVid')[0].play();
//     });

//     $('#closeVideoBtn').on('click', function() {
//         $('#fullscreenVideoContainer').css('display', 'none');
//         $('#fullscreenVid')[0].pause();
//         $('#fullscreenVid')[0].currentTime = 0; // Сбросить видео к началу
//     });
//     
	$(document).ready(function () {
    // Открытие меню
    $('.menu-icon').click(function () {
        $('body').addClass('menu-open'); // Отключаем прокрутку страницы
        $('.mobile-menu-block').fadeIn(300).animate({right: '0'}, 300);
    });

    // Закрытие меню
    $('.close-mobile').click(function () {
        $('.mobile-menu-block').animate({right: '-100%'}, 300, function () {
            $(this).fadeOut(300);
            $('body').removeClass('menu-open'); // Возвращаем прокрутку страницы
        });
    });

    // Открытие видео
    $('.open-video-btn').click(function (e) {
        e.preventDefault();
        $('#fullscreenVideoContainer').css('display', 'flex');
        $('#fullscreenVid')[0].play();
        $('.fullscreen-video-container').fadeIn(300);
    });

    // Закрытие видео
    $('#closeVideoBtn, .close-video-btn').click(function () {
        $('.fullscreen-video-container').fadeOut(500);
        $('#fullscreenVid')[0].pause();
        $('#fullscreenVid')[0].currentTime = 0; // Сбросить видео к началу
        $('#fullscreenVideoContainer').css('display', 'none');
    });

    // Открытие модального окна студии
    $('.modal-studio-open').click(function () {
        $('.modal-studio-img').fadeIn(300);
    });
});

	
	 $('.modal-studio-open').on('click', function() {
        $('.modal-studio-img').fadeIn();
    });
	
});


