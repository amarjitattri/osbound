<table class="table table-xs table-bordered" border="0">
    <thead>
        <tr>
            <td>Description</td>
            <td width="{{ @$page =='create' ? '' : '210' }}">VAT Rate</td>
            <td width="{{ @$page =='create' ? '' : '210' }}">Amount</td>
            <td width="{{ @$page =='create' ? '' : '115' }}">VAT</td>
            <td width="90">#</td>
        </tr>
        <tr>
            <td>
                {!! Form::textarea('estimate_amount_description',null, ['class' => 'form-control form-control-sm','rows'=>'5','id'=>'estimate_amount_description_0']) !!}
            </td>
            <td>
                {!! Form::select('estimate_amount_vat_rate',vat_rate(),'20', ['class' => 'form-control form-control-sm form-control-right change_vat_rate','id'=>'estimate_amount_vat_rate_0','data-index'=>'0']) !!}
            </td>
            <td>
                {!! Form::number('estimate_amount',null, ['class' => 'form-control form-control-sm form-control-right calculate_vat','id'=>'estimate_amount_0','data-index'=>'0']) !!}
            </td>
            <td>
                {!! Form::number('estimate_amount_vat',null, ['class' => 'form-control form-control-sm form-control-right','id'=>'estimate_amount_vat_0','readonly']) !!}
                {!! Form::hidden('estimate_amount_total_amount',null, ['id'=>'estimate_amount_total_amount_0','readonly']) !!}
            </td>
            <td>
                <input type="hidden" id="estimate_id" value="{{@$enquiry->id}}">
                @if (isset($oldData))
                    <button type="button" class="btn btn-sm btn-block btn-primary" id="addNewEstimateAmount"
                            data-route="{{route('estimates.amount',@$oldData->id)}}">Add
                    </button>
                @else
                    <button type="button" class="btn btn-sm btn-block btn-primary" id="addNewEstimateAmountDom">Add</button>
                @endif
            </td>
        </tr>
    </thead>
    <tbody id="estimateAmountTbody">
        @includeIf('backend.estimates.inner.amountTbody',['tbody'=>@$oldData->amounts])
    </tbody>
</table>
@section('customjs')
    @parent
    <script type="text/x-handlebars-template" id="addMoreEstimateAmountRow">
        <tr id="update_estimate_tr_{i}">
            <td><textarea rows="3" name="estimate_amount_array[{i}][description]" class="form-control form-control-sm"
                          id="dom_description_{i}" data-index="{i}">{description}</textarea></td>
            <td>
                <select class="form-control form-control-sm dom_change_vat_rate" id="dom_vat_rate_{i}" data-index="{i}"
                        name="estimate_amount_array[{i}][vat_rate]">
                    @foreach(vat_rate() as $key => $vat)
                        <option value="{{$key}}" {vat_rate_selected}>{{$vat}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="text" value="{amount}" name="estimate_amount_array[{i}][amount]"
                       class="form-control form-control-sm dom_calculate_vat form-control-right" id="dom_amount_{i}"
                       data-index="{i}">
            </td>
            <td>
                <input type="text" value="{vat}" name="estimate_amount_array[{i}][vat]"
                       class="form-control form-control-sm form-control-right" id="dom_amount_vat_{i}" readonly>
                <input type="hidden" value="{total_amount}" name="estimate_amount_array[{i}][total_amount]"
                       class="form-control form-control-sm form-control-right" id="dom_amount_total_amount_{i}"
                       readonly>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger delete_dom_row" id="delete_btn_{i}"
                        data-amt_id="{i}"><i class="ti-trash"></i></button>
            </td>
        </tr>
    </script>
    <script>
        let estimate_amount_description = $("#estimate_amount_description_0"),
            estimate_amount = $("#estimate_amount_0"), estimate_amount_vat_rate = $("#estimate_amount_vat_rate_0"),
            estimate_amount_vat = $("#estimate_amount_vat_0");
        estimate_amount_total_amount = $("#estimate_amount_total_amount_0");
        $(document).on('click', '#addNewEstimateAmount', function () {
            let route = $(this).data('route');
            $.ajax({
                url: route,
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    description: estimate_amount_description.val(),
                    amount: estimate_amount.val(),
                    vat_rate: estimate_amount_vat_rate.val(),
                    vat: estimate_amount_vat.val(),
                    total_amount: estimate_amount_total_amount.val()
                },
                beforeSend: function () {
                    $("#addNewEstimateAmount").html('<img src="{{asset('images/ajax-loader.gif')}}">');
                },
                success: function (res) {
                    toastr.success("Estimate amount has been added.");
                    $("#estimateAmountTbody").html(res);
                },
                complete: function () {
                    estimate_amount_description.val('');
                    estimate_amount.val('');
                    estimate_amount_vat.val('');
                    estimate_amount_total_amount.val('');
                    $("#addNewEstimateAmount").html('add');
                }
            })
        });
        $(document).on('click', '#addNewEstimateAmountDom', function () {
            let t = $(this), tbody = $("#estimateAmountTbody"), l = tbody.find('tr').length,
                template = $("#addMoreEstimateAmountRow").html();
            let html = template.replace(/{i}/g, l).replace(/{description}/g, estimate_amount_description.val()).replace(/{amount}/g, estimate_amount.val()).replace(/{vat}/g, estimate_amount_vat.val()).replace(/{total_amount}/g, estimate_amount_total_amount.val());
            tbody.append(html);
            $(`#dom_vat_rate_${l}`).val(estimate_amount_vat_rate.val());
            estimate_amount_description.val('').focus();
            estimate_amount.val('');
            estimate_amount_vat.val('')
            estimate_amount_total_amount.val('')
        });
        $(document).on('click', '.delete_dom_row', function () {
            $(this).parent().parent().remove();
        });
    </script>
@endsection
