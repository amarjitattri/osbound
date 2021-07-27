<table class="table table-xs table-bordered">
    <thead>
    <td width="{{ @$page =='create' ? '360' : '' }}">Description</td>
    <td width="{{ @$page =='create' ? '' : '210' }}">VAT Rate</td>
    <td width="{{ @$page =='create' ? '' : '210' }}">Amount</td>
    <td width="{{ @$page =='create' ? '' : '115' }}">VAT</td>
    <td width="90">#</td>
    </thead>
    <tbody id="estimateAmountTbody">
    @includeIf('backend.estimates.inner.amountTbody',['tbody'=>@$oldData->amounts])
    </tbody>
</table>
