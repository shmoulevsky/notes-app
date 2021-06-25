<?php

namespace App\Http\Controllers;


use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::delete($file->url);
        $file->delete();
        return response(['message' => 'Deleted']);
    }

}
