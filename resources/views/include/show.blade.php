@extends('layout.default')
@section('content')


<h1>showing {{ $GalleryImages->username }}</h1>
<div>

<h2>{{ $GalleryImages->image_name }} : <h2> <br>

        <img src="/uploadimage/{{$GalleryImages->image_name . '.' .
         $GalleryImages->image_extension}}">

    </div>


@stop