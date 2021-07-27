<fieldset>
    <legend>Administration</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group text-center">
                <label for="reminder">Reminder</label>
                {!! Form::text('reminder', null, ['class' => 'form-control form-control-sm date_timepicker']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group text-center">
                <label for="snooze">Snooze</label>
                {!! Form::number('snooze', null, ['class' => 'form-control form-control-sm']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('dropdown_status', 'Status',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('status',@$status,null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'dropdown_status']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('dropdown_reason', 'Reason',['class'=>'col-md-4 col-form-label']) !!}
        <div class="col-8">
            {!! Form::select('reason',@$reason,null, ['class' => 'custom-select custom-select-sm','placeholder'=>'--SELECT--','id'=>'dropdown_reason','disabled']) !!}
        </div>
    </div>
</fieldset>

@section('customjs')
    @parent
    <script>
        $(document).on('change', '#dropdown_status', function () {
            let v = $(this).val();
            if (v === '3') {
                $("#dropdown_reason").prop('disabled', false);
                $("#dropdown_reason").prop('required', true);
            }else{
                $("#dropdown_reason").prop('required', false);
                $("#dropdown_reason").prop('disabled', true);
            }
        });
    </script>
@endsection
