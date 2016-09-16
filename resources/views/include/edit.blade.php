@extends('layout.default')
@section('content')


     <h1>Upload a Photo </h1>


     <hr/>

     @if (count($errors) > 0)
	 <div class="alert alert-danger">
	 <strong>Whoops! </strong> There were some problems with your input. <br> <br>
	 <ul>
	     @foreach ($errors->all() as $error)
		 <li>{{ $error }} </li>
	     @endforeach

         </ul>
         </div>

    @endif


    {!! Form::model($GalleryImages, ['route'=>['home.update', $GalleryImages->id], 'files' => true, 'method'=> 'PATCH'])  !!}

     <!-- image title Form Input -->
     <div class ="container">
     <div class ="row">
     <div class ="col-xs-6">
     <div class="well bs-component">

      

    <!-- form field for file -->
    <div class="form-group">
       {!! Form::label('image', 'Primary Image') !!}
       {!! Form::file('image', null, array('required', 'class'=>'form-control')) !!}
    </div>


     <div class="form-group">

        {!! Form::submit('Upload Photo', array('class'=>'btn btn-primary')) !!}

     </div>
     </div>
     </div>
     </div>
     </div>


    {!! Form::close() !!}

@endsection