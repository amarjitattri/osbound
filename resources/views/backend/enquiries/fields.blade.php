<div class="row">
    <div class="col-md-9" style="border-right: 2px solid #98989a">
        {!! Form::open(['route' => 'enquiries.store', 'method' => 'post', 'id'=>'enquiry_create_form','files' => true,'autocomplete'=>'off']) !!}
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="form-row">
                    <div class="col-md-12" id="company_contact_details_div">
                        @includeIf('backend.shared.company_contact')
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-3">
                <div class="form-row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend>Image Files</legend>
                            <div class="custom-file" style="margin-bottom: 12px;">
                                <input type="file" class="custom-file-input" id="customFile" name="image_files[]" accept="image/*"
                                       multiple>
                                <label class="custom-file-label" for="customFile">Choose image file</label>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <fieldset>
                            <legend>Audio Files</legend>
                            <div class="custom-file"  style="margin-bottom: 12px;">
                                <input type="file" class="custom-file-input" id="audio_files[]" name="audio_files[]" accept="audio/*" multiple>
                                <label class="custom-file-label" for="audio_files">Choose audio file</label>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <fieldset>
                    <legend>Enquiry Details</legend>
                    <div class="form-group">
                        <input type="hidden" name="description" id="description_hidden">
                        {!! Form::textarea('description_textarea', null, ['class' => 'form-control','id'=>'description','required']) !!}
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row formSubmitStatus" id="formSubmitStatus">
            <div class="col-md-12 text-center">
                <div class="progress" id="formSubmitProgressBar">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">0%</div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-sm btn-primary">Save Enquiry</button>
                <a href="{{route('enquiries.index')}}" class="btn btn-sm btn-warning">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-3">
        @includeIf('backend.shared.company_contact_add_new_form')
    </div>
</div>
