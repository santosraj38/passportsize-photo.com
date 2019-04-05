<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class WatermarkController extends Controller
{
    public function index(){
      return view('pages.watermark');
    }

    public function watermark(Request $request){

      $filename = public_path('images/'.$request->file('image')->getClientOriginalName());
      $watermark = public_path('images/'.time().'.png');
      Image::make($request->file('watermark'))->encode('png')->resize($request->watermarkwidth,$request->watermarkheight)->opacity($request->opacity)->save($watermark);
      Image::make($request->file('image'))->insert($watermark,$request->watermarkposition)->save($filename);

      File::delete($watermark);
      return response()->download($filename)->deleteFileAfterSend(true);
    }
}
