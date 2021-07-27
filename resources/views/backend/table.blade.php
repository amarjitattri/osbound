<div class="col-auto table-responsive">
    <table class="table table-striped table-bordered table-hover table-xs">
        <thead>
        @if(!empty($tableHeader))
            <tr>
                @foreach($tableHeader as $head)
                    @if($head=='sr_no')
                        <th width="15">Sr.No.</th>
                    @elseif($head=='action')
                        <th width="25">Action</th>
                    @elseif($head=='status')
                        <th width="5">Status</th>
                    @else
                        <th>{{ucwords(str_replace('_',' ',$head))}}</th>
                    @endif
                @endforeach
            </tr>
        @endif
        </thead>
        <tbody>
        @if(!empty($tableData) && $tableData->count())
            @foreach($tableData as $body)
                <tr>
                    @foreach($tableHeader as $td)
                        @if($td=='sr_no')
                            <th>{{ @++$k }}</th>
                        @elseif($td=='status')
                            <th>
                                <input id="switch_{{ $body->id }}" class="switch" type="checkbox"
                                       data-route="{{route('isActiveOrDeactivate',[$body->id,$tableName ?? $baseRoute])}}"
                                       data-id="{{ $body->id }}" {{ $body->is_active ? 'checked' : '' }} />
                            </th>
                        @elseif($td=='action')
                            <th>
                                @if(Route::has($baseRoute.'.show'))
                                    <a href="{{ route($baseRoute.'.show',$body->id) }}"
                                       class="btn btn-xs btn-outline-primary active"><i class="ti-eye"></i></a>
                                @endif
                                @if(Route::has($baseRoute.'.edit'))
                                    <a href="{{ route($baseRoute.'.edit',$body->id) }}"
                                       class="btn btn-xs btn-outline-info active"><i
                                            class="ti-pencil"></i></a>
                                @endif
                                @if(Route::has($baseRoute.'.destroy'))
                                    {!! Form::open(['route' => [$baseRoute.'.destroy',$body->id], 'method' => 'post','class'=>'inline-block']) !!}
                                    <button class="btn btn-xs btn-outline-danger active deleted"><i class="ti-trash"></i></button>
                                    {!! Form::close() !!}
                                @endif
                            </th>
                        @else
                            <td>{{$body->$td}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
