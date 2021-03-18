<?php


namespace App\Services;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function uploadImage($file)
    {
        $uploaded = false;
        $extension = $file->getClientOriginalExtension();
        $basePath = uniqid();
        $image = Image::make($file->getRealPath());
        $height = $image->height();
        $width = $image->width();

        $pieceHeight = $height / 2;
        $pieceWidth = $width / 2;
        $part = 1;
        for($y = 0; $y < 2; $y++) {
            for($x = 0; $x < 2; $x++) {
                $model = new \App\Models\Image();
                $xOffset = ceil($pieceWidth * $x);
                $yOffset = ceil($pieceHeight * $y);
                $path = 'images/'.$basePath.'/';
                $filename = 'piece_'.$part.'.'.$extension;
                $fullPath = $path . $filename;
                $model->fill([
                    'path'             => $fullPath,
                    'piece_identifier' => $basePath,
                    'partition_no'     => $part,
                ]);
                if ($model->save()) {
                    Storage::makeDirectory($path, 0777, true);
                    Image::make($file->getRealPath())
                        ->crop(ceil($pieceWidth), ceil($pieceHeight), $xOffset, $yOffset)
                        ->save('userdata/'.$fullPath);
                    $uploaded = true;
                }
                $part++;
            }
        }
        return [
            'uploaded' => $uploaded,
            'message' => 'Upload failed',
        ];
    }
}
