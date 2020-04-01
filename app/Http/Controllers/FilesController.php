<?php

namespace App\Http\Controllers;

use App\Models\File as FileModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class FilesController extends Controller
{

    public function download(Request $request, $id)
    {

        $file = FileModel::find($id);



        //   $response = Response::make($file, 200);
        //     $response->header("Content-Type", $type);

        return Response::download(storage_path('app/files/' . $file->path), $file->name);
    }

    public function displayImage(Request $request, $id)
   {

    $file = FileModel::find($id);
    $path = storage_path('app/files/' . $file->path);
    $type = $file->extension;
    
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", 'image/' . $type);

    return $response;

}
}
