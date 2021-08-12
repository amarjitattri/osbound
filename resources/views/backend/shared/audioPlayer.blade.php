<div class="row" id="audioPlayerContainer">
  <div class="col-md-12">
      <div class="media_player row">
        <div class="col-md-12">
          <div class="form-row audio_wrapper">
            <div class="audio_recorder" id="audio_record_wrapper">
              <button class="btn btn-mic btn-outline-primary active" type="button"
                id="btn_start_recoding">
                <i class="ti-microphone"></i> <span class="d-none"
                  id="recording_start">Recording<span class="dot"></span><span
                    class="dot"></span><span class="dot"></span></span>
              </button>
              <button class="btn btn-mic btn-outline-warning d-none" type="button"
                id="btn_pause_recoding"> Pause</button>
              <button class="btn btn-mic btn-outline-danger d-none" type="button"
                id="btn_stop_recoding"> Stop</button>
              <button href="#" class="btn btn-mic btn-outline-primary d-none"
                type="button" id="btn_play_recoding"> Play
              </button>
              <a href="#" class="btn btn-mic btn-outline-secondary d-none"
                id="btn_download_recoding"> Download</a>
              <button class="btn btn-mic btn-outline-success d-none" type="button"
                id="btn_upload_recoding"
                data-route="{{route('medias.store')}}"
                data-job="{{$job_data->id}}"
                data-media="jobs">
                Upload
              </button>
              <button class="btn btn-mic btn-outline-info d-none" type="button"
                id="btn_cancel_recoding"><i class="ti-back-left"></i></button>
              <div id="formats" class="d-none">Format: start recording to see sample
                rate</div>
              <audio src="#" id="current_recorded_audio" controls
                class="d-none"></audio>
              <span class="file_loader"><img
                  src="{{asset('images/ajax-loader.gif')}}"
                  alt=""></span>
            </div>
            <div class="audio_files_upload" id="browse_audio_file">
              <div class="custom-file">
                <input type="file" class="custom-file-input media_upload"
                  data-type="2" data-job="{{$job_data->id}}"
                  data-route="{{route('medias.store')}}"
                  data-target="audioPlayerContainer" id="audio_files"
                  name="audio_files[]" accept="audio/*" multiple>
                <label class="custom-file-label" for="audio_files">Add audio
                  file</label>
              </div>
              <span class="file_loader"><img
                  src="{{asset('images/ajax-loader.gif')}}"
                  alt=""></span>
            </div>
          </div>
          <audio preload="auto" id="audioPlayerElement"></audio>
          <ul class="list-group audioPlayList scroll" id="audioPlayList">
            @foreach ($job_data->audios()->get() as $audio)
            <li class="list-group-item audio_play_list" data-src="{{asset($audio->path)}}" data-id="{{$audio->id}}" id="audio_play_list_{{$audio->id}}">
              <div class="custom-control custom-checkbox d-inline">
                <input type="checkbox" class="custom-control-input selected_audios" id="audio_checkbox_{{$audio->id}}" value="{{$audio->id}}">
                <label class="custom-control-label" for="audio_checkbox_{{$audio->id}}"></label>
              </div>
              <span class="badge badge-success badge-pill audio_play_pause_btn" ><i class="ti-control-play"></i></span>
              {{@++$i}} Audio File
              <span type="button" class="badge badge-danger float-right badge-pill delete_audio" data-media-id="{{$audio->id}}"><i class="ti-trash"></i></span>
            </li>
          @endforeach
          </ul>
          <div class="my-1 b-t-danger">
            <button class="btn btn-sm btn-danger btn-block" type="button"
              id="delete_selected_audios" disabled>Delete Audio
            </button>
          </div>
          <div class="my-4" id="audioPlayerContainer">
              <div class="m-b-10">
                <img src="{{asset('images/no_image.png')}}" alt=""
                  class="audio_preview_img" style="width: 100%;">
              </div>
              <div class="player_track">
                <div class="timeline">
                  <div id="timebox">
                    <span id="currentTimeValue">00:00</span> / <span
                      id="totalTimeValue">00:00</span>
                  </div>
                  <input type="range" min="1" max="100" value="0" class="slider"
                    id="audioPlayHeadSlider">
                </div>
              </div>
              <div class="player_controls">
                <button class="btn btn-outline-primary" type="button" id="backward_audio"><i
                    class="ti-control-backward"></i></button>
                <button class="btn btn-outline-success" type="button" id="play_pause_audio"><i
                    class="ti-control-play"></i></button>
                <button class="btn btn-outline-primary" type="button" id="forward_audio"><i
                    class="ti-control-forward"></i></button>
              </div>
            </div>
        </div>
      </div>
  </div>
</div>

@section('customjs')
  @parent
  <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>
  <script src="{{asset('js/audio_recorder.js')}}"></script>
  <script src="{{asset('js/audio_player.js')}}"></script>
  <script>
    $(document).on('click', '#delete_selected_audios', function (e) {
      if (confirm("Are your want to delete this item?")) {
        let oldText = $(this).text();
        let mediaIds = $('input:checkbox.selected_audios:checked').map(function () {
          return this.value;
        }).get().join();
        $.ajax({
          url: "{{route('medias.destroyMultiple')}}",
          type: 'DELETE',
          data: {
            _method: 'DELETE',
            _token: '{{ csrf_token() }}',
            media_from: 'jobs',
            media_ids: mediaIds
          },
          beforeSend: function () {
            $(this).html('<img src="{{asset('images/ajax-loader.gif')}}">');
          },
          success: function (res) {
            if (!res.error) {
              $('input:checkbox.selected_audios:checked').each(function (i, v) {
                $(`#audio_play_list_${v.value}`).remove();
              });
              toastr.success("Media has been deleted.");
            }
          },
          complete: function () {
            $(this).html(oldText);
            $("#delete_selected_audios").prop('disabled', true);
          }
        })
      }
    });
    $(document).on('click', '.delete_audio', function (e) {
      if (confirm("Are your want to delete this item?")) {
        let oldText = $(this).text();
        let mediaIds = $(this).data('media-id');
        $.ajax({
          url: "{{route('medias.destroyMultiple')}}",
          type: 'DELETE',
          data: {
            _method: 'DELETE',
            _token: '{{ csrf_token() }}',
            media_from: 'jobs',
            media_ids: mediaIds
          },
          beforeSend: function () {
            $(this).html('<img src="{{asset('images/ajax-loader.gif')}}">');
          },
          success: function (res) {
            if (!res.error) {
              $(`#audio_play_list_${mediaIds}`).remove();
              toastr.success("Media has been deleted.");
            }
          },
          complete: function () {
            $(this).html(oldText);
            $("#delete_selected_audios").prop('disabled', true);
          }
        })
      }
    });
  </script>
@endsection
