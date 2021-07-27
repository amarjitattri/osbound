@extends('layouts.printLayout')
@section('title')
    {{$page_title}}
@endsection
@section('content')
    <div class="print_shell">
        <div class="invoice_header">
            <table class="table table_head" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="30%">
                        <img src="{{ public_path('backend/assets/images/'.config('site.invoice_logo')) }}" style="width:280px;">
                    </td>
                    <td width="30%" style="padding-left:20px;font-size:12px;">
                        <span style="display:block; line-height:10px;">52 Lydden Road</span>
                        <span style="display:block; line-height:10px;">Wandsworth</span>
                        <span style="display:block; line-height:10px;">London</span>
                        <span style="display:block; line-height:10px;">SW18 4LR</span><br>
                        <span style="display:block;line-height:10px;">T 020 8879 1085</span>
                        <span style="display:block;line-height:10px;">W www.osbondandtutt.co.uk</span>
                         <span style="display:block;line-height:10px;">E info@osbondandtutt.co.uk</span>
                    </td>
                    <td style="text-align:right; vertical-align:bottom;">
                        <h2 style="margin:0; line-height:20px;">Job No.<br>{{$estimate->job_no}}</h2>
                    </td>
                </tr>
            </table>
        </div>

        <div class="qutation_to">
            <table class="table table_bord_0" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td style="width:50% !important;">
                        <span style="display:block; line-height:17px;"><strong>Quotation To:</strong></span>
                        <span style="display:block; line-height:12px;">{{$estimate->contact_name}}</span>
                        <span style="display:block; line-height:12px;">{{$estimate->company_name}}</span>
                        <span style="display:block; line-height:12px;">{{$estimate->contact_address_line1}}</span>
                        <span style="display:block; line-height:12px;">{{$estimate->county}}</span>
                        <span style="display:block; line-height:12px;">{{$estimate->postal_code}}</span>
                    </td>
                    <td  style="width:50% !important; vertical-align:top;" >
                        <span class="m_wrapp"style="display:block; line-height:13px; margin-left:80px;margin-top:8px;"><span style="width:120px;text-align:right;display:inline-block;font-weight:600;">Invoice</span><label style="width:100px; padding-left:20px; text-align:left !important;display:inline-block;">{{$estimate->estimate_date}}</label></span>
                        <span class="m_wrapp"style="display:block; line-height:13px;margin-left:80px;"><span style="width:120px;text-align:right;display:inline-block;font-weight:600;">Job No.</span><label style="width:100px; padding-left:20px; text-align:left !important;display:inline-block;">{{$estimate->job_number}}</label></span>
                        <span class="m_wrapp"style="display:block; line-height:13px;margin-left:80px;"><span style="width:120px;text-align:right;display:inline-block;font-weight:600;">Due Before</span><label style="width:100px; padding-left:20px; text-align:left;display:inline-block;">{{$estimate->due_before}}</label></span>
                    </td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td colspan="2" style="text-align:left !important; padding-left:0;">
                        <span style="font-weight:600; width:100px;display:inline-block;">PO No.</span><label style="display:inline-block;">{{$estimate->po_number}}</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:left !important; padding-left:0;">
                       <span style="font-weight:600; width:100px;display:inline-block;">Project ref</span><label style="display:inline-block;">{{$estimate->project_ref}}</label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="description_to">
            <table class="table descr_table_bord_0" cellspacing="0" cellpadding="0" border="0">
                <thead>
                <tr>
                    <th width="70%" style="word-break: break-all; text-align:left">DESCRIPTION</th>
                    <th>AMOUNT</th>
                    <th>VAT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="3"><span class="small_note" style="text-align:center !important;display: block">Note: THIS IS NOT A V.A.T INVOICE</span></td>
                </tr>
                @if ($estimate->amounts->count())
                    @php
                        $total_vat = $total_amount = 0;
                    @endphp
                    @foreach($estimate->amounts as $amount)
                        @php $total_vat += $amount->vat; $total_amount += $amount->amount@endphp
                        <tr>
                            <td width="70%" style="padding-bottom: 3px;padding-top: 3px;">
                              <span style="line-height: 0.8;">{!! nl2br($amount->description) !!}</span>
                            </td>
                            <td>{{$amount->amount_number != '0.00' ? '£ '.$amount->amount_number : ''}}</td>
                            <td>{{$amount->vat_number !='0.00' ? '£ '.$amount->vat_number : ''}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                @endif
                </tbody>
                <tfoot style="padding-top: 10px">
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="50%"><span class="title_bold">SUB TOTAL</span></td>
                    <td>£ {{@number_format($total_amount,2)}}</td>
                </tr>
                <tr>
                    <td width="10%"></td>
                    <td width="50%"><span class="title_bold">VAT TOTAL</span></td>
                    <td>£ {{@number_format($total_vat,2)}}</td>
                </tr>
                <tr>

                    <td colspan="2" align="right"><span class="title_bold">INVOICE TOTAL</span></td>
                    <td>£ {{@number_format($total_amount+@$total_vat,2)}}</td>
                </tr>
                </tfoot>
            </table>
        </div>

    </div>
    <div class="invoice_footer" style="position:fixed;bottom:20px; left:0; right:0; line-height:10px !important;">
            <p style="margin:0px; font-size:11px; line-height:10px !important; padding:0px;"><strong>BACS Details : </strong><strong>Sort Code 20-90-69 - Acc No. 90339792</strong></p>
            <p style="margin:0; font-size:11px; line-height:10px !important; padding:0px;"><span>VAT Reg No: 798 5638 50</span> - <span>Registered in England No: 4085667</span> - <span>UTR No: 1349701001</span></p>
    </div>
@endsection
