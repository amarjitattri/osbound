@if(!empty($formFields))
    <div class="row">
        @foreach($formFields as $section => $field)
            <div class="col-md-6">
                @includeIf('fields.' . $field['type'] )
            </div>
        @endforeach
    </div>
@endif
