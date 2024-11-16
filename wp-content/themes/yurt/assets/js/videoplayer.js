document.addEventListener('DOMContentLoaded', () => {
    const playPauseButtons = document.querySelectorAll('.play-pause i');
    const rewindButtons = document.querySelectorAll('.rewind');
    const forwardButtons = document.querySelectorAll('.forward');
    const timelines = document.querySelectorAll('.timeline');
    const volumeButtons = document.querySelectorAll('.volume i');
    const settingsButtons = document.querySelectorAll('.settings i');
    const speedButtons = document.querySelectorAll('.speed');
    const volumePanels = document.querySelectorAll('.volume-panel');
    const speedPanels = document.querySelectorAll('.speed-panel');
    const fullscreenButtons = document.querySelectorAll('.fullscreen i');

    const closeAllPanels = () => {
        volumePanels.forEach(panel => panel.style.display = 'none');
        speedPanels.forEach(panel => panel.style.display = 'none');
    };

    playPauseButtons.forEach((button) => {
        const video = button.closest('.video-container').querySelector('video');
        button.addEventListener('click', () => {
            if (video.paused) {
                video.play();
                button.classList.remove('fa-play');
                button.classList.add('fa-pause'); // Замените на иконку паузы
            } else {
                video.pause();
                button.classList.remove('fa-pause');
                button.classList.add('fa-play'); // Иконка старта
            }
        });
    });

    rewindButtons.forEach((button) => {
        const video = button.closest('.video-container').querySelector('video');
        button.addEventListener('click', () => {
            video.currentTime = Math.max(0, video.currentTime - 5);
        });
    });

    forwardButtons.forEach((button) => {
        const video = button.closest('.video-container').querySelector('video');
        button.addEventListener('click', () => {
            video.currentTime = Math.min(video.duration, video.currentTime + 5);
        });
    });

    timelines.forEach((timeline) => {
        const video = timeline.closest('.video-container').querySelector('video');
        video.addEventListener('timeupdate', () => {
            const value = (video.currentTime / video.duration) * 100;
            timeline.value = value;
        });

        timeline.addEventListener('input', () => {
            const value = (timeline.value / 100) * video.duration;
            video.currentTime = value;
        });
    });

    volumeButtons.forEach((button) => {
        const volumePanel = button.closest('.custom-controls').querySelector('.volume-panel');
        button.addEventListener('click', () => {
            const isVisible = volumePanel.style.display === 'block';
            closeAllPanels();
            volumePanel.style.display = isVisible ? 'none' : 'block';
        });
    });

    volumePanels.forEach((panel) => {
        const video = panel.closest('.video-container').querySelector('video');
        const volumeControl = panel.querySelector('.volume-control');
        volumeControl.addEventListener('input', () => {
            video.volume = volumeControl.value;
        });
    });

    settingsButtons.forEach((button) => {
        const speedPanel = button.closest('.custom-controls').querySelector('.speed-panel');
        button.addEventListener('click', () => {
            const isVisible = speedPanel.style.display === 'flex';
            closeAllPanels();
            speedPanel.style.display = isVisible ? 'none' : 'flex';
        });
    });

    speedButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const video = button.closest('.video-container').querySelector('video');
            video.playbackRate = button.getAttribute('data-speed');
            const speedPanel = button.closest('.speed-panel');
            speedPanel.style.display = 'none';
        });
    });
	const modals = document.querySelectorAll('.workModal');

    modals.forEach((modal) => {
        const video = modal.querySelector('video');
        const playPauseButton = modal.querySelector('.play-pause i');

        modal.addEventListener('hidden.bs.modal', () => {
            if (video) {
                video.pause(); // Остановить видео
                video.currentTime = 0; // Сбросить видео к началу

                // Сбрасываем иконку на состояние play
                if (playPauseButton.classList.contains('fa-pause')) {
                    playPauseButton.classList.remove('fa-pause');
                    playPauseButton.classList.add('fa-play');
                }
            }
        });
    });


    fullscreenButtons.forEach((button) => {
        const videoContainer = button.closest('.video-container');
        button.addEventListener('click', () => {
            if (!document.fullscreenElement) {
                if (videoContainer.requestFullscreen) {
                    videoContainer.requestFullscreen();
                } else if (videoContainer.mozRequestFullScreen) { // Firefox
                    videoContainer.mozRequestFullScreen();
                } else if (videoContainer.webkitRequestFullscreen) { // Chrome, Safari and Opera
                    videoContainer.webkitRequestFullscreen();
                } else if (videoContainer.msRequestFullscreen) { // IE/Edge
                    videoContainer.msRequestFullscreen();
                }
                button.classList.remove('fa-window-maximize');
                button.classList.add('fa-window-minimize'); // Иконка выхода из полноэкранного режима
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari and Opera
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // IE/Edge
                    document.msExitFullscreen();
                }
                button.classList.remove('fa-window-minimize');
                button.classList.add('fa-window-maximize'); // Иконка входа в полноэкранный режим
            }
        });
    });
});
