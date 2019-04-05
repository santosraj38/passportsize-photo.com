<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class AddtexttoimageController extends Controller
{
    public function index(){
      return view('pages.addtexttoimage');
    }

    public function addtexttoimage(Request $request){

      $filename = public_path('images'.$request->file('image')->getClientOriginalName());

      Image::make($request->file('image'))
        ->text($request->text, $request->xoffset, $request->yoffset, function($font) use ($request) {
        $font->file(public_path('fonts/'.$request->fontstyle.'.ttf'));
        $font->size($request->fontsize);
        $font->color($request->fontcolor);
        $font->align($request->align);
        $font->valign($request->valign);
        $font->angle(0);
      })->save($filename);

      return response()->download($filename)->deleteFileAfterSend(false);

    }
}
