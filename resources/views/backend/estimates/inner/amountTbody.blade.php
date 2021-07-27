@if ($tbody)
    @foreach ($tbody as $tr)
        <tr id="update_estimate_tr_{{$tr->id}}">
            <td><textarea rows="3" name="update_description" class="form-control form-control-sm" id="estimate_amount_description_{{$tr->id}}"  data-index="{{$tr->id}}">{{$tr->description}}</textarea></td>
            <td>{!! Form::select('update_vat_rate',vat_rate(),$tr->vat_rate, ['class' => 'form-control form-control-sm form-control-right change_vat_rate','id'=>'estimate_amount_vat_rate_'.$tr->id,'data-index'=>$tr->id]) !!}
            <td><input type="text" value="{{$tr->amount}}" name="update_amount" id="estimate_amount_{{$tr->id}}" class="form-control form-control-sm calculate_vat form-control-right" data-index="{{$tr->id}}"></td>
            <td>
                <input type="text" value="{{$tr->vat}}" name="update_vat" class="form-control form-control-sm form-control-right" id="estimate_amount_vat_{{$tr->id}}"  data-index="{{$tr->id}}" readonly>
                <input type="hidden" value="{{$tr->total_amount}}" name="update_total_amount" class="form-control form-control-sm form-control-right" id="estimate_amount_total_amount_{{$tr->id}}"  data-index="{{$tr->id}}" readonly>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-primary updateEstimateAmount" id="update_btn_{{$tr->id}}" data-amt_id="{{$tr->id}}" data-route="{{route('estimates.amount.update',[$tr->id,$tr->estimates_id])}}">Update</button>
                <button type="button" class="btn btn-sm btn-danger deleteEstimateAmount" id="delete_btn_{{$tr->id}}" data-amt_id="{{$tr->id}}" data-route="{{route('estimates.amount.delete',$tr->id)}}"><i class="ti-trash"></i></button>
            </td>
        </tr>
    @endforeach
@endif
@section('customjs')
    @parent
    <script>
        $(document).on('click', '.updateEstimateAmount', function (e) {
            let that = $(this), amt_id = that.data('amt_id'),route = that.data('route'),
                update_description = $(`#update_estimate_tr_${amt_id} input[name='update_description']`),
                update_amount = $(`#update_estimate_tr_${amt_id} input[name='update_amount']`),
                update_vat_rate = $(`#update_estimate_tr_${amt_id} select[name='update_vat_rate']`),
                update_vat = $(`#update_estimate_tr_${amt_id} input[name='update_vat']`);
                update_total_amount = $(`#update_estimate_tr_${amt_id} input[name='update_total_amount']`);
            $.ajax({
                url: route,
                type: 'post',
                data: {
                    _method: 'PATCH',
                    _token: '{{ csrf_token() }}',
                    description: update_description.val(),
                    amount: update_amount.val(),
                    vat_rate: update_vat_rate.val(),
                    vat: update_vat.val(),
                    total_amount: update_total_amount.val()
                },
                beforeSend: function () {
                    $(`#update_btn_${amt_id}`).html('<img src="{{asset('images/ajax-loader.gif')}}">');
                },
                success: function (res) {
                    toastr.success("Estimate amount has been updated.");
                    $("#estimateAmountTbody").html(res);
                },
                complete: function () {
                    $(`#update_btn_${amt_id}`).html('update');
                }
            })
        });
        $(document).on('click', '.deleteEstimateAmount', function (e) {
            let that = $(this), route = that.data('route'), amt_id = that.data('amt_id');
            if (confirm("Are your want to delete this item?")) {
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    beforeSend: function () {
                        $(`#delete_btn_${amt_id}`).html('<img src="{{asset('images/ajax-loader.gif')}}">');
                    },
                    success: function (res) {
                        if (!res.error) {
                            toastr.success("row has been deleted.");
                        }
                    },
                    complete: function () {
                        $(`#update_estimate_tr_${amt_id}`).remove();
                    }
                })
            }
        });
    </script>
@endsection
