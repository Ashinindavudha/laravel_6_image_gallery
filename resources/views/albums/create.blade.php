@extends('include.app')

@section('content')
<h1>Album Create</h1>
{!! Form::open(['action' => 'AblumController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<!-- {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!} -->

{{Form::text('name', '', ['placeholder' => 'Album Name'])}}
<!-- {{Form::textarea('description', '', ['placeholder' => 'Album Description'])}} -->
{!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}

{{Form::file('cover_image')}}

{!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}

 {!! Form::close() !!}
@endsection