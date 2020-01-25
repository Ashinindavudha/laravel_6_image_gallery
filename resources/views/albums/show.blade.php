@extends('include.app')

@section('content')
<h1>{{$album->name}}</h1>
<br>
<br>
<a class="btn btn-outline-primary" href="{{ route('albums.index') }}">Go Back</a>
<a class="btn btn-outline-primary" href="{{ route('photos.create') }}">Upload Photo To Album</a>
@endsection