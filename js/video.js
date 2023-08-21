const video = document.querySelector('video');
const play = document.querySelector('.play');

const playVideo = () => {
    if(video.paused) {
        video.play();
        //video.controls = '1';
        play.classList.add('hidden');
    } else {
        //video.controls = '0';
        video.pause();
        play.classList.remove('hidden');
    }
};

video.addEventListener('click', playVideo);
play.addEventListener('click', playVideo);