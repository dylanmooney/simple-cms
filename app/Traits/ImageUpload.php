<?php

namespace App\Traits;

trait ImageUpload
{
    public function uploadImage($user, $image)
    {
        $image->store('public/images');

        $uploadedImage = $user->images()->create([
            'path' => $image->hashName(),
            'original_name' => $image->getClientOriginalName(),
            'mime_type' => $image->getMimeType(),
            'file_size' => $image->getSize(),
            'alt_text' => '',
        ]);

        return $uploadedImage;
    }
}
