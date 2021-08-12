URL = window.URL || window.webkitURL;
let gumStream, rec, input, blobFile, blobFileUrl;
let AudioContext = window.AudioContext || window.webkitAudioContext;
let audioContext = new AudioContext;
const constraints = {
    audio: true,
    video: false
}
const formatPrintLabel = $('#formats');
const currentRecordedAudio = document.getElementById('current_recorded_audio');
$(document).on('click', "#btn_start_recoding", function (e) {
    startRecording();
});
$(document).on('click', "#btn_pause_recoding", function (e) {
    pauseRecording();
});
$(document).on('click', "#btn_stop_recoding", function (e) {
    stopRecording();
});
$(document).on('click', "#btn_upload_recoding", function (e) {
    uploadRecording();
});
$(document).on('click', "#btn_download_recoding", function (e) {
    downloadRecording();
});
$(document).on('click', "#btn_cancel_recoding", function (e) {
    cancelRecording();
});
$(document).on('click', "#btn_play_recoding", function (e) {
    playRecordedAudio();
});

function startRecording() {
    msgLog("recordButton clicked");
    changeBtnState('start');
    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
        msgLog("getUserMedia() success, stream created, initializing Recorder.js ...");
        audioContext = new AudioContext();
        formatPrintLabel.innerHTML = "Format: 1 channel pcm @ " + audioContext.sampleRate / 1000 + "kHz";
        gumStream = stream;
        input = audioContext.createMediaStreamSource(stream);
        rec = new Recorder(input, {numChannels: 1});
        rec.record();
        msgLog("Recording started");
    }).catch(function (err) {
        changeBtnState('failed');
        msgLog("getUserMedia() failed...");
        console.error(err);
    });
}

function pauseRecording() {
    msgLog("pauseButton clicked rec.recording=", rec.recording);
    if (rec.recording) {
        rec.stop();
        changeBtnState('pause');
    } else {
        rec.record();
        changeBtnState('resume');
    }
}

function stopRecording() {
    msgLog("stopButton clicked");
    changeBtnState('stop');
    rec.stop();
    gumStream.getAudioTracks()[0].stop();
    rec.exportWAV(createDownloadLink);
}

function cancelRecording() {
    msgLog("cancelButton clicked");
    changeBtnState('back');
    rec.stop();
    gumStream.getAudioTracks()[0].stop();
}

function createDownloadLink(blob) {
    blobFile = blob;
    blobFileUrl = URL.createObjectURL(blobFile)
    currentRecordedAudio.src = blobFileUrl;
}

function playRecordedAudio() {
    if (currentRecordedAudio.paused) {
        currentRecordedAudio.play();
    } else {
        currentRecordedAudio.pause();
    }
}

function downloadRecording() {
    let filename = new Date().toISOString();
    $("#btn_download_recoding").attr('href', blobFileUrl);
    $("#btn_download_recoding").attr('download', `${filename}.wav`);
}

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});

function uploadRecording() {
    msgLog("Upload Button Clicked...");
    let form_data_files = new FormData(), filename = new Date().toISOString();
    let btnUploadRecording = $('#btn_upload_recoding');
    form_data_files.append("audio_files[0]", blobFile);
    form_data_files.append("file_name", filename);
    form_data_files.append('_token', $('meta[name="_token"]').attr('content'));
    (btnUploadRecording.attr('data-job') !== undefined) ? form_data_files.append("job_id", btnUploadRecording.attr('data-job')) : null;
    (btnUploadRecording.attr('data-media') !== undefined) ? form_data_files.append("media_from", btnUploadRecording.attr('data-media')) : null;
    
    $.ajax({
        type: 'POST',
        url: $('#btn_upload_recoding').attr('data-route'),
        data: form_data_files,
        contentType: false,
        processData: false,
        beforeSend: function () {
            changeBtnState('uploading');
            $(`#audio_record_wrapper`).find(".file_loader").show()
        },
        success: function (res) {
            $(`#_files`).val('');
            $(`#audioPlayerContainer`).parent().html(res);
        },
        complete: function () {
            changeBtnState('uploaded');
            $(`#audio_record_wrapper`).find(".file_loader").hide()
        }
    });
}

function msgLog(msg) {
    console.log(msg);
}

function changeBtnState(t) {
    if (t === 'start') {
        $("#btn_start_recoding").prop("disabled", true).removeClass('d-none');
        $("#btn_stop_recoding").prop("disabled", false).removeClass('d-none');
        $("#btn_pause_recoding").prop("disabled", false).removeClass('d-none');
        $("#browse_audio_file").addClass('d-none');
        $("#recording_start").removeClass('d-none');
        $("#btn_cancel_recoding").removeClass('d-none');
    }
    if (t === 'pause') {
        $("#btn_pause_recoding").remove('btn-warning').add('btn-info').html('Resume');
    }
    if (t === 'resume') {
        $("#btn_pause_recoding").remove('btn-info').add('btn-warning').html('Pause');
    }
    if (t === 'stop') {
        $("#btn_start_recoding").prop("disabled", true);
        $("#btn_pause_recoding").prop("disabled", false).addClass('d-none');
        $("#btn_download_recoding").removeClass('d-none').prop("disabled", false);
        $("#btn_play_recoding").removeClass('d-none').prop("disabled", false);
        $("#btn_upload_recoding").removeClass('d-none').prop("disabled", false);
        $("#btn_stop_recoding").addClass('d-none');
        $("#recording_start").addClass('d-none');
    }
    if (t === 'uploading') {
        $("#btn_download_recoding").prop("disabled", true);
        $("#play_pause_audio").prop("disabled", true);
        $("#btn_upload_recoding").prop("disabled", true);
    }
    if (t === 'uploaded') {
        $("#btn_start_recoding").prop("disabled", false);
        $("#btn_stop_recoding").addClass('d-none').prop("disabled", true);
        $("#btn_pause_recoding").addClass('d-none').prop("disabled", true);
        $("#browse_audio_file").removeClass('d-none');
        $("#recording_start").addClass('d-none');
        $("#btn_cancel_recoding").addClass('d-none');
    }

    if (t === 'failed') {
        $("#btn_start_recoding").addClass('d-none').prop("disabled", false);
        $("#btn_stop_recoding").addClass('d-none').prop("disabled", true);
        $("#btn_play_recoding").addClass('d-none').prop("disabled", true);
        $("#browse_audio_file").removeClass('d-none');
        $("#recording_start").addClass('d-none');
        $("#btn_cancel_recoding").addClass('d-none');
    }
    if (t === 'back') {
        $("#btn_start_recoding").prop("disabled", false);
        $("#btn_stop_recoding").addClass('d-none').prop("disabled", true);
        $("#btn_pause_recoding").addClass('d-none').prop("disabled", true);
        $("#btn_play_recoding").addClass('d-none').prop("disabled", true);
        $("#btn_cancel_recoding").addClass('d-none');
        $("#btn_download_recoding").addClass('d-none');
        $("#btn_upload_recoding").addClass('d-none');
        $("#browse_audio_file").removeClass('d-none');
        $("#recording_start").addClass('d-none');
    }
}
