<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploaderController extends Controller
{

    public function upload(Request $request)
    {

        Model::unguard();
        $uploadedFile = $request->file('file');

        $fileName = str_random(32);

        if ($uploadedFile->isValid()) {
            $uploadedFile->move(storage_path('app/files'), $fileName);
        }

        $type = '';
        if ($uploadedFile->getClientOriginalExtension() == 'zip' || $uploadedFile->getClientOriginalExtension() == 'rar') {
            $type = 'file-archive';
        }
        if ($uploadedFile->getClientOriginalExtension() == 'txt') {
            $type = 'file-text';
        }
        if ($uploadedFile->getClientOriginalExtension() == 'jpg' || $uploadedFile->getClientOriginalExtension() == 'png'
            || $uploadedFile->getClientOriginalExtension() == 'jpeg' || $uploadedFile->getClientOriginalExtension() == 'bmp'
        ) {
            $type = 'file-image';
        }
        if ($uploadedFile->getClientOriginalExtension() == 'txt') {
            $type = 'file-text';
        }

        if ($uploadedFile->getClientOriginalExtension() == 'pdf') {
            $type = 'file-pdf';
        }

        $file = File::create([
            'path' => $fileName,
            'name' => $uploadedFile->getClientOriginalName(),
            'extension' => $uploadedFile->getClientOriginalExtension()
        ]);

        return $file;
    }
}
