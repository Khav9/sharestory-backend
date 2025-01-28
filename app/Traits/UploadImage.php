<?php

namespace App\Traits;

trait uploadImage
{

    function saveImage($image, $path = null)
    {
        $path = $path ?: 'images';

        $imageName = time() . '_' . $image->getClientOriginalName();

        // Store the image in the storage/app/public directory
        $storedPath = $image->storeAs($path, $imageName, 'public');

        // $image->storeAs($path,$imageName,'public');
        return $storedPath;
    }
}
