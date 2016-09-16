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
			<td><<img src="/uploadimage/thumbnails/{{'thumb-'.$GalleryImage->image_name . '.' .
         $GalleryImage->image_extension}}"></td>
            <td>
            <form method="POST" action="{{ route('home.destroy', $GalleryImage->id) }}" accept-charset="UTF-8">
	                <input name="_method" type="hidden" value="DELETE">
	                <input name="_token" type="hidden" value="{{ csrf_token() }}">
					<a href="{{ route('home.show', $GalleryImage->id) }}" class="btn btn-warning">SHOW</a> <br/><br/> 
	              	 <a href="{{ route('home.edit', $GalleryImage->id) }}" class="btn btn-warning">EDIT</a> <br/><br/> 
	                <input onclick="return confirm('Anda yakin akan menghapus data ?');" type="submit" value="Hapus" class="btn btn-danger"/>
	            </form>
	            </td>
			
		</tr>
	@endforeach
	</tbody>
</table>
  <a href="{{ route('home.create') }}" class="btn btn-success">Add data</a> <br/><br/>
  </div>


@stop