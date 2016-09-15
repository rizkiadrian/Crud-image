@extends('layout.default')
@section('content')

<div class ="container">
<h3>READ</h3>
<h2>Table Mahasiswa</h2>
  <p>Data Mahasiswa</p>
  <table class="table table-hover">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Email</th>
			<th>Action</th>	
		</tr>
	</thead>
	<tbody>
	@foreach($GalleryImages as $GalleryImage)
		<tr>
			<td>{{$GalleryImage->username}}</td>
			<td>{{$GalleryImage->image_name}}</td>
			<td>{{$GalleryImage->image_path}}</td>
			
		</tr>
	@endforeach
	</tbody>
</table>
  <a href="{{ route('home.create') }}" class="btn btn-success">Add data</a> <br/><br/>
  </div>


@stop