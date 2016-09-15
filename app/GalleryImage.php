<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
     protected $table = 'gallery_images';

    protected $fillable =        [ 
                                   'image_name',
                                   'image_path',
                                   'image_extension,'
                                    
                                 ];
}
