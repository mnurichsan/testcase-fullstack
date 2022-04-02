<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


function uploads($file, $path)
{
    if($file){

        $fileName   = time() . $file->getClientOriginalName();
        Storage::disk('public')->put($path .'/'. $fileName, File::get($file));
        $file_name  = $file->getClientOriginalName();
        $file_type  = $file->getClientOriginalExtension();
        $filePath   = 'storage/'.$path.'/' . $fileName;

        return $file = [
            'image' => $filePath,
        ];
    }
}

function rupiahFormat($number)
{
    return "Rp ".number_format($number, 0, ",", ".");
}