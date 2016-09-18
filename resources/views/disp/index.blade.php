@extends('layout.default')
@section('content')
<script>$('#container').masonry();</script>

<!--<div class ="container">
<h3>READ</h3>
<h2>Table Mahasiswa</h2>
  <p>Data Mahasiswa</p>
  <table class="table table-hover">
		<tr>
			<th>Username</th>
			<th>Image Title</th>
			<th>Image Path</th>
			<th>Image</th>
			<th>Action</th>	
		</tr>
	</thead>
	<tbody>-->
	@foreach($GalleryImages as $GalleryImage)
	<div id="container">
	<div class="grid">
<div class="grid-item grid-item--width2 col-xs-3"><img src="/uploadimage/thumbnails/{{'thumb-'.$GalleryImage->id . '.' .
         $GalleryImage->image_extension}}">
    <div class="grid-item"><h3><b>{{$GalleryImage->username}}</b><h3></div>
    <div class="grid-item"><h4><b>{{$GalleryImage->image_name}}</b><h4></div>
    <form method="POST" action="{{ route('home.destroy', $GalleryImage->id) }}" accept-charset="UTF-8">
	                <input name="_method" type="hidden" value="DELETE">
	                <input name="_token" type="hidden" value="{{ csrf_token() }}">
	<div class ="grid">  
	<div class="grid-item grid-item--width2 col-xs-3">
    <div class="grid-item"><a href="{{ route('home.show', $GalleryImage->id) }}" class="btn btn-warning">SHOW</a> </div>
    </div>
    <div class="grid-item grid-item--width2 col-xs-3">
    <div class="grid-item"><a href="{{ route('home.edit', $GalleryImage->id) }}" class="btn btn-warning">EDIT</a> </div>
    </div>
    <div class="grid-item grid-item--width2 col-xs-3">
    <div class="grid-item"><input onclick="return confirm('Anda yakin akan menghapus data ?');" type="submit" value="Hapus" class="btn btn-danger"/></div>
    </div>
	</div></br></br></br></br>
	</div>          
   </div>
</div>
</form>

		<!--<tr>
			<td>{{$GalleryImage->username}}</td>
			<td>{{$GalleryImage->image_name}}</td>
			<td>{{$GalleryImage->image_path}}</td>
			<td><img src="/uploadimage/thumbnails/{{'thumb-'.$GalleryImage->image_name . '.' .
         $GalleryImage->image_extension}}"></td>
            <td>
            <form method="POST" action="{{ route('home.destroy', $GalleryImage->id) }}" accept-charset="UTF-8">
	                <input name="_method" type="hidden" value="DELETE">
	                <input name="_token" type="hidden" value="{{ csrf_token() }}">
					<a href="{{ route('home.show', $GalleryImage->id) }}" class="btn btn-warning">SHOW</a> <br/><br/> 
	              	 <a href="{{ route('home.edit', $GalleryImage->id) }}" class="btn btn-warning">EDIT</a> <br/><br/> 
	                <input onclick="return confirm('Anda yakin akan menghapus data ?');" type="submit" value="Hapus" class="btn btn-danger"/>
	            </form>
	            </td>-->
			
		</tr>
	@endforeach
	
  <a href="{{ route('home.create') }}" class="btn btn-success">Add data</a> <br/><br/>




@stop