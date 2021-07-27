@if(!empty($formFields))
    @foreach($formFields as $section => $field)
        @includeIf('fields.' . $field['type'] )
    @endforeach
@endif
