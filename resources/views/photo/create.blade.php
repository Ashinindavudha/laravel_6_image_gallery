@extends('include.app')

@section('content')
<h1>Create Upload Photo</h1>
{!! Form::open(['action' => 'PhotoController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<!-- {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!} -->

{{Form::text('title', '', ['placeholder' => 'Photo Title'])}}
<!-- {{Form::textarea('description', '', ['placeholder' => 'Album Description'])}} -->
{!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
{!! Form::hidden('ablum_id', $ablum_id) !!}

{{Form::file('photo')}}

{!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}

 {!! Form::close() !!}
@endsection