{!! Form::open(['route' => 'place_of_works.store', 'method' => 'post']) !!}
@includeIf('backend.place_of_works.fields')
{!! Form::close() !!}
