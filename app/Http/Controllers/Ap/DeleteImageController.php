<?php

namespace App\Http\Controllers\Ap;

use App\Http\Controllers\Controller;
use App\Picture;
use Illuminate\Http\Request;

class DeleteImageController extends Controller
{
    public function deleteImg(Request $request)
    {
        $picture = Picture::findOrFail($request->id);
        unlink(public_path('images/items/' . $picture->value));
        $picture->delete();
        echo TRUE;
    
    }
}
