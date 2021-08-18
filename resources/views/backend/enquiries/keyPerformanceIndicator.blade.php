<h5 class="text-center">Key Performance Indicators</h5>
<table class="table table-borderless table-xs">
  <tr>
    <th colspan="2" class="text-center">Enquiry Counts</th>
  </tr>
  @foreach ($keyPerformance['status'] as $status)
    <tr>
      <th><a href="{{route($baseRoute.'.index')}}?status={{$status['id']}}">{{$status['title']}}</a></th>
      <td align="right"><a href="{{route($baseRoute.'.index')}}?status={{$status['id']}}">{{$status['total']}}</a></td>
    </tr>
  @endforeach
</table>
<hr>
<table class="table table-borderless table-xs">
  <tr>
    <th colspan="2" class="text-center">Closed Enquiries</th>
  </tr>
  @foreach ($keyPerformance['reason'] as $reason)
    <tr>
      <th><a href="{{route($baseRoute.'.index')}}?reason={{$reason['id']}}">{{$reason['title']}}</a></th>
      <td align="right"><a href="{{route($baseRoute.'.index')}}?reason={{$reason['id']}}">{{$reason['total']}}</a></td>
    </tr>
  @endforeach
</table>
<hr>
<table class="table table-borderless table-xs">
  <tr>
    <th colspan="2" class="text-center">Total Enquiries Todate</th>
  </tr>
    <tr>
      <td colspan="2" class="text-center">{{$keyPerformance['total_count']}}</td>
    </tr>
</table>
