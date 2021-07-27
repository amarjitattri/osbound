<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Name</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $val)
      <tr>
        <td>{{ $val->name }}</td>
        <td>

          <div class="btn-group">
            @if($val->isActive)
              <a href="{{ route($baseRoute.'.inactivate',@$val->id) }}" class="btn btn-outline-warning" onclick="return confirm('Are you sure you want to mark this Estimated Professional Item inactive? ')"><i class="fa fa-close"></i></a>
            @else
              <a href="{{ route($baseRoute.'.activate',@$val->id) }}" class="btn btn-outline-primary" onclick="return confirm('Are you sure you want to mark this Estimated Professional Items active? ')"><i class="fa fa-check"></i></a>
            @endif
            <a href="{{ route($baseRoute.'.edit',$val->id) }}" class="btn btn-outline-info">
              <i class="fa fa-edit"></i>
            </a>
            {!! Form::open(['route' => [$baseRoute.'.destroy', $val->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class'=>'btn btn-outline-danger','onclick' => "return confirm('Are you sure?')"]) !!}
            {!! Form::close() !!}
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
{{ $data->links() }}
