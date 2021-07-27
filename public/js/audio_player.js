$(function () {
    let currentList, audioPlayer, currentAudioId, audioPlayHeadSlider, seekto, currentTimeValue, totalTimeValue,
        seeking = false;
    $(document).on('click', '.audio_play_list .audio_play_pause_btn', function () {
        if (typeof currentList != 'undefined') {
            if (currentList.data('id') !== $(this).parent('li').data('id')) {
                resetAudioList();
                currentAudioId = $(this).parent('li').data('id');
                playAudio($(this).parent('li'));
            } else {
                playAudio(currentList);
            }
        } else {
            currentAudioId = $(this).parent('li').data('id');
            playAudio($(this).parent('li'));
        }
    });
    $(document).on('click', '#play_pause_audio', function () {
        if (!currentList) {
            currentAudioId = $('#audioPlayList li:first').data('id');
            playAudio($('#audioPlayList li:first'));
        } else {
            playAudio(currentList);
        }
    });

    $(document).on('click', '#backward_audio', function () {
        if (currentList) {
            if (audioPlayer.duration < (audioPlayer.currentTime - 10.0)) {
                audioPlayer.currentTime -= 10.0;
            }
        }
    });
    $(document).on('click', '#forward_audio', function () {
        console.log(audioPlayer.duration);
        if (currentList) {
            if (audioPlayer.duration > (audioPlayer.currentTime + 10.0)) {
                audioPlayer.currentTime += 10.0;
            }
        }
    });
    function playAudio(selectedAudio) {
        if (window.HTMLAudioElement) try {
            audioPlayer = document.getElementById("audioPlayerElement");
            audioPlayHeadSlider = document.getElementById('audioPlayHeadSlider');
            currentTimeValue = document.getElementById("currentTimeValue");
            totalTimeValue = document.getElementById("totalTimeValue");
            if (selectedAudio !== currentList) {
                currentList = selectedAudio;
                audioPlayer.src = currentList.data('src');
            }
            if (audioPlayer.paused) {
                audioPlayer.play();
                $("#play_pause_audio i").removeClass('ti-control-play').addClass('ti-control-pause');
                $(`#audio_play_list_${currentAudioId}`).addClass('active').find(".audio_play_pause_btn i").removeClass('ti-control-play').addClass('ti-control-pause');
            } else {
                audioPlayer.pause();
                $("#play_pause_audio i").removeClass('ti-control-pause').addClass('ti-control-play');
                $(`#audio_play_list_${currentAudioId} .audio_play_pause_btn i`).removeClass('ti-control-pause').addClass('ti-control-play');
            }
            audioPlayer.addEventListener("timeupdate", function () {
                audioTimeTrackUpdate();
            });
            audioPlayer.addEventListener("ended", function () {
                startPosition();
            });
            // audioPlayHeadSlider.addEventListener("mousedown", function (event) {
            //     seeking = true;
            //     seek(event);
            // });
            // audioPlayHeadSlider.addEventListener("mousemove", function (event) {
            //     seek(event);
            // });
            // audioPlayHeadSlider.addEventListener("mouseup", function () {
            //     seeking = false;
            // });
        } catch (e) {
            console.log(e)
        }
    }

    function resetAudioList() {
        $(".audio_play_list").each(function (i, v) {
            $(this).removeClass('active').find(".audio_play_pause_btn i").removeClass('ti-control-pause').addClass('ti-control-play');
        })
    }

    function audioTimeTrackUpdate() {
        audioPlayHeadSlider.value = audioPlayer.currentTime * (100 / audioPlayer.duration);
        let curmins = Math.floor(audioPlayer.currentTime / 60);
        let cursecs = Math.floor(audioPlayer.currentTime - curmins * 60);
        let durmins = Math.floor(audioPlayer.duration / 60);
        let dursecs = Math.floor(audioPlayer.duration - durmins * 60);
        if (cursecs < 10) {
            cursecs = "0" + cursecs;
        }
        if (dursecs < 10) {
            dursecs = "0" + dursecs;
        }
        if (curmins < 10) {
            curmins = "0" + curmins;
        }
        if (durmins < 10) {
            durmins = "0" + durmins;
        }
        currentTimeValue.innerHTML = curmins + ":" + cursecs;
        totalTimeValue.innerHTML = durmins + ":" + dursecs;
    }

    function startPosition() {
        $("#play_pause_audio i").removeClass('ti-control-pause').addClass('ti-control-play');
        $(`#audio_play_list_${currentAudioId} .audio_play_pause_btn i`).removeClass('ti-control-pause').addClass('ti-control-play');
    }

    function seek(event) {
        if (seeking) {
            audioPlayHeadSlider.value = event.clientX - audioPlayHeadSlider.offsetLeft;
            seekto = audioPlayer.duration * (audioPlayHeadSlider.value / 100);
            audioPlayer.currentTime = seekto;
        }
    }
});
