<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

class DeleteImageController extends Controller
{
    public function deleteImg(Request $request)
    {
        $picture = Picture::findOrFail($request->id);
        unlink(public_path('images/product/' . $picture->value));
        $picture->delete();
        echo TRUE;
    
    }
}
