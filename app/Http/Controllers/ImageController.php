<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    private $imageService;
    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $images = Image::all();
        return view('index', compact('images', $images));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png'
        ]);
        if ($request->file('file')) {
            $result = $this->imageService->uploadImage($request->file('file'));
            if ($result['uploaded']) {
                return redirect()->back()->with('success', 'Картинка успешно загружена');
            }
        }
        return redirect()->back()->with(['error', 'Картинка не была загружена']);
    }

    public function show($piece_identifier, $part)
    {
        $images = Image::where([
            'piece_identifier' => $piece_identifier,
            'partition_no'     => $part
        ])->first();
        $result = [];
//        foreach ($images as $image) {
//            $result[] = [
//                'image_url' => $image->getPath()
//            ];
//        }
        return response()->file($images->getPath());
    }
}
