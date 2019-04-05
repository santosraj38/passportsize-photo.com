<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use Session;

class BackgroundController extends Controller
{

      public function index(){

        return view('pages.autobackgroundremove');
      }

      public function backgroundupload(Request $request){
        $filename = time().'.png';
        if (session()->has('image')) {
          File::delete(public_path('images/'.session('image')));
        }
        session(['image'=>$filename]);
        $img = Image::make(base64_decode($request->image))->save(public_path('images/'.$filename));
        return '<div class="ui positive message"><i class="close icon"></i>Image Successfully Uploaded</div>';
      }

/*
      public function backgroundupload(Request $request){
        if ($request->hasFile('image')==false && session()->has('image')==false) {
          return redirect()->route('background');

        }elseif ($request->hasFile('image')) {
          $request->validate([
            'image'=>'required|image'
          ]);
          $filename = time().'-'.$request->file('image')->getClientOriginalName();
          Image::make($request->file('image'))->save(public_path('images/'.$filename));
          session(['image'=>$filename]);
          return redirect()->route('getbackgroundpage');

        }elseif (session()->has('image')) {
          return redirect()->route('getbackgroundpage');
        }else {
          return redirect()->route('background');
        }



      }


      public function getbackgroundpage(){
        if (session()->has('image')) {
          return view('pages.backgroundremove');
        }else {
          return redirect()->route('backgroundupload');
        }

      }


      public function backgroundprocess(Request $request){

        if (session()->has('image')==false) {
          return redirect()->route('cropimageuploadpage');
        }else {
          $imagewidth =getimagesize(public_path('images/'.session('image')))[0];
          $imageheight = getimagesize(public_path('images/').session('image'))[1];
          // create empty canvas with background color
          $img = Image::canvas($imagewidth, $imageheight);

          // define polygon points
          // define polygon points

          // draw a filled blue polygon with red border
          $img->polygon($request->boundry, function ($draw) use ($request) {
              $draw->background($request->backgroundcolor);
              $draw->border(1,$request->backgroundcolor);
          });

          $filename = public_path('images/'.session('image'));
          $image = Image::make(file_get_contents($filename))->insert($img,'top-left',0,0)->save(public_path('images/'.session('image')));
          return response()->download($filename)->deleteFileAfterSend(false);
        }


      }
*/
  }
