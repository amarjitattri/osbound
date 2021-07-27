{!! Form::model($oldData, ['route' => ['place_of_works.update', $oldData->id], 'method' => 'post']) !!}
@method('PATCH')
@includeIf('backend.place_of_works.fields')
{!! Form::close() !!}
