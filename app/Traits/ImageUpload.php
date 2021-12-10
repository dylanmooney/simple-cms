<?php

namespace App\Traits;

trait ImageUpload
{
    public function uploadImage($user, $image)
    {
        $path = $image->store('public/images');

        $path = explode("/", $path)[2];

        $uploadedImage = $user->images()->create([
            'path' => $path,
            'original_name' => $image->getClientOriginalName(),
            'mime_type' => $image->getMimeType(),
            'file_size' => $image->getSize(),
            'alt_text' => '',
        ]);

        return $uploadedImage;
    }
}
