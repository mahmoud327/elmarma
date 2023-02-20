<?php

namespace App\Traits;

use Intervention\Image\ImageManagerStatic as Image;

trait ImageTrait
{
    public function uploadImage($path, $file, $old = null)
    {


        if ($old && file_exists($old)) {
            unlink($old);
        }

        Image::make($file)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path($path.'/'.$file->hashName()));
        return $file->hashName();

    }

    public function uploadFile($path, $file, $old = null)
    {
        if ($old && file_exists($old)) {
            unlink($old);
        }

        $fileName = time() . '.' . $file->extension();
        $file->move(public_path($path), $fileName);

        return $fileName;
    }

}
