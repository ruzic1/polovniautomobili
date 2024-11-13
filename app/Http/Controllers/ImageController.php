<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //

    public function show($imageName)
    {
        //dd($imageName);
        $path=storage_path('app/public/images/{$imageName}');

        if(!Storage::exists($path)){
            abort(404);
        }
        return response()->file($path);
    }
}
