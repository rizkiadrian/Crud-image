<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GalleryImage;
use App\Http\Requests\SiteRequest;
use App\Http\Requests\EditRequest;
use Image; 
use Illuminate\Support\Facades\File;


class GalleryCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GalleryImages = GalleryImage::all();
        return view('disp.index', compact('GalleryImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('include.create', compact('GalleryImages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request)
    {
        $GalleryImages = new GalleryImage();
        $GalleryImages->username = $request->username;
        $GalleryImages->image_name = $request->image_name;
        $GalleryImages->image_extension = $request->file('image')->getClientOriginalExtension();
       //define the image paths
       $destinationFolder = public_path().'\uploadimage';
       $destinationThumbnail = public_path().'\uploadimage\thumbnails';
       //assign the image paths to new model, so we can save them to DB
       $GalleryImages->image_path = $destinationFolder;
       $GalleryImages->save();
       //parts of the image we will need
       $file = $request->file('image');
       $imageName = $GalleryImages->image_name;
       $extension = $request->file('image')->getClientOriginalExtension();
       $image = Image::make($file->getRealPath());
       //save image with thumbnail
       $image->save(public_path().'/uploadimage/'.$imageName . '.' . $extension)->resize(400, 600)->save(public_path().'/uploadimage/thumbnails/'. 'thumb-' . $imageName . '.' . $extension);

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $GalleryImages = GalleryImage::findOrFail($id);

   return view('include.show', compact('GalleryImages'));
}
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GalleryImages = GalleryImage::findOrFail($id);
        return view('include.edit', compact('GalleryImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {

     $GalleryImages = GalleryImage::findOrFail($id);
      if (!empty($request->file('image'))){

       $destinationFolder = public_path().'\uploadimage';
       $destinationThumbnail = public_path().'\uploadimage\thumbnails';

       $file = $request->file('image');

       $imageName = $GalleryImages->image_name;
       $extension = $request->file('image')->getClientOriginalExtension();

       $image = Image::make($file->getRealPath());
       //save image with thumbnail
       $image->save(public_path().'/uploadimage/'.$imageName . '.' . $extension)->resize(400, 600)->save(public_path().'/uploadimage/thumbnails/'. 'thumb-' . $imageName . '.' . $extension);
        return redirect()->route('home.index');
       

   }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $GalleryImages = GalleryImage::findOrFail($id);
   $thumbPath = $GalleryImages->image_path.'\thumbnails';
   File::delete(public_path('/uploadimage/').
                            $GalleryImages->image_name . '.' .
                            $GalleryImages->image_extension);
    File::delete(public_path('/uploadimage/thumbnails/'.'thumb-').
                            $GalleryImages->image_name . '.' .
                            $GalleryImages->image_extension);

     
   
    GalleryImage::destroy($id);

   return redirect()->route('home.index');

    }
}
