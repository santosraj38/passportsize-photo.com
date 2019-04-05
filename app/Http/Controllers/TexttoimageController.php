<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class TexttoimageController extends Controller
{
  public function index(){
    return view('pages.texttoimage');
  }

  public function texttoimage(Request $request){



    $filename = public_path('images/'.time().'.png');
    // create Image from file
      $img = Image::canvas($request->width,$request->height,$request->background)
        ->text($request->text, $request->xoffset, $request->yoffset, function($font) use ($request) {
        $font->file(public_path('fonts/'.$request->fontstyle.'.ttf'));
        $font->size($request->fontsize);
        $font->color($request->fontcolor);
        $font->align('left');
        $font->valign('right');
        $font->angle(0);
      })->save($filename);

      return response()->download($filename)->deleteFileAfterSend(true);
  }
}
