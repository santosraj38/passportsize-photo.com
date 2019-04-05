<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Image;
use Session;

class CropController extends Controller
{

    public function cropimageuploadpage(){

      return view('pages.cropupload');
    }



    public function cropimageupload(Request $request){
      if ($request->hasFile('image')==false && session()->has('image')==false) {
        return redirect()->route('cropimageuploadpage');


      }elseif ($request->hasFile('image')) {
        $request->validate([
          'image'=>'required|image'
        ]);
        $filename = time().'-'.$request->file('image')->getClientOriginalName();
        Image::make($request->file('image'))->save(public_path('images/'.$filename));
        session(['image'=>$filename]);
        return redirect()->route('getcroppage');

      }elseif (session()->has('image')) {
        return redirect()->route('getcroppage');
      }else {
        return redirect()->route('cropimageupload');
      }



    }


    public function getcroppage(){
      if (session()->has('image')) {
        return view('pages.cropimage');
      }else {
        return redirect()->route('cropimageuploadpage');
      }

    }


    public function cropimageprocess(Request $request){

      if (session()->has('image')==false) {
        return redirect()->route('cropimageuploadpage');
      }else {
        $filename = public_path('images/'.session('image'));
        Image::make(file_get_contents($filename))->crop($request->width,$request->height,$request->x,$request->y)->save($filename);
        return response()->download($filename)->deleteFileAfterSend(false);
      }


    }

}
