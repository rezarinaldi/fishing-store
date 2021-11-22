<?php

namespace App\Http\Controllers\Ap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function imgupload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file_Name = $request->file('upload')->getClientOriginalName();

            $request->file('upload')->move(public_path('images/items/'), $file_Name);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/items/' . $file_Name);
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
