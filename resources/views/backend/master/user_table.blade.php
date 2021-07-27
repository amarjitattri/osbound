<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $val)
      <tr>
        <td>{{ $val->name }}</td>
        <td>{{ $val->email }}</td>
        <td>{{ roles($val->isAdmin) }}</td>
        <td>
          <div class="btn-group">
            <a href="{{ route($baseRoute.'.edit',$val->id) }}" class="btn btn-ghost-info">
              <i class="fa fa-edit"></i>
            </a>
            {!! Form::open(['route' => [$baseRoute.'.destroy', $val->id], 'method' => 'delete']) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class'=>'btn btn-ghost-danger','onclick' => "return confirm('Are you sure?')"]) !!}
            {!! Form::close() !!}
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
{{ $data->links() }}
