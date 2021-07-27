<fieldset>
    <legend>Images</legend>
    <div class="row">
        <div class="col-md-5">
            <div class="form-row">
                <div class="col-md-12 image_files_upload">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input media_upload" id="image_files"
                               data-type="1" data-enquiry="{{$oldData->id}}"
                               data-route="{{route('uploadMediaFiles',$oldData->id)}}"
                               data-target="imageViewerContainer" name="image_files[]"
                               accept="image/*" multiple>
                        <label class="custom-file-label" for="customFile">Add image file</label>
                    </div>
                    <span class="file_loader"><img src="{{asset('images/ajax-loader.gif')}}" class="img-responsive" alt=""></span>
                </div>
            </div>
            <ul class="enquiry_image_thumb set-width image_thumb_grid scroll">
                @if ($oldData->images()->count())
                    @foreach ($oldData->images() as $image)
                        <li data-src="{{$image->url}}" id="image_li_{{$image->media_id}}">
                            <div class="enquiry_inner set-bg"
                                 style="background: url('{{$image->url}}')">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input selected_images"
                                           id="image_checkbox_{{$image->media_id}}"
                                           value="{{$image->media_id}}">
                                    <label class="custom-control-label"
                                           for="image_checkbox_{{$image->media_id}}"></label>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <h5 class="p-t-50 p-b-50 m-auto">Images Not Found</h5>
                @endif
            </ul>
            <button class="btn btn-sm btn-danger btn-block delete_selected_images" type="button" disabled
                    id="delete_selected_images">Delete Selected Image
            </button>
        </div>
        <div class="col-md-7">
            <ul class="enquiry_image_preview">
                <li>
                    <div class="preview-inner set-bg" id="preview_image_section" style="background: url('{{asset('images/no_image.png')}}');"></div>
                </li>
            </ul>
        </div>
    </div>
</fieldset>
@section('customjs')
    @parent
    <script>
        let no_image = '{{asset('images/no_image.png')}}';
        $(document).on('click', '#delete_selected_images', function (e) {
            if (confirm("Are your want to delete this item?")) {
                let oldText = $(this).text();
                let mediaIds = $('input:checkbox.selected_images:checked').map(function () {
                    return this.value;
                }).get().join();
                $.ajax({
                    url: "{{route('enquiryMediaDelete',1)}}",
                    type: 'DELETE',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}',
                        media_ids: mediaIds
                    },
                    beforeSend: function () {
                        $(this).html('<img src="/images/ajax-loader.gif">');
                    },
                    success: function (res) {
                        if (!res.error) {
                            $('input:checkbox.selected_images:checked').each(function (i, v) {
                                $(`#image_li_${v.value}`).remove();
                            });
                            $("#preview_image_section").css("background-image", `url(${no_image})`);
                            toastr.success("Media has been deleted.");
                        }
                    },
                    complete: function () {
                        $(this).html(oldText);
                        $("#delete_selected_images").prop('disabled', true);
                    }
                })
            }
        });
        $(document).on('change', '.media_upload', function (e) {
            let form_data_files = new FormData(), type = $(this).data('type'), enquiry = $(this).data('enquiry'),
                route = $(this).data('route'),
                target = $(this).data('target'), file_id = type === 1 ? 'image' : 'audio',
                input_file = $(`#${file_id}_files`)[0], totalFiles = input_file.files.length;
            for (let i = 0; i < totalFiles; i++) {
                form_data_files.append(`${file_id}_files[]`, input_file.files[i]);
            }
            form_data_files.append('type', type);
            form_data_files.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: route,
                type: 'post',
                contentType: false,
                processData: false,
                data: form_data_files,
                beforeSend: function () {
                    $(`#${file_id}_files`).parent().siblings(".file_loader").show()
                },
                success: function (res) {
                    $(`#${file_id}_files`).val('');
                    $(`#${file_id}_files`).siblings(".custom-file-label").html(`Choose ${file_id} file`);
                    $(`#${target}`).html(res);
                },
                complete: function () {
                    $(`#${file_id}_files`).parent().siblings(".file_loader").hide()
                }
            })
        });
    </script>
@endsection
