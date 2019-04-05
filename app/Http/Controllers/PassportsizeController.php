<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class PassportsizeController extends Controller
{
  public function index(){
    return view('pages.passportsize');
  }

  public function passportsize(Request $request){

    if (session()->has('image')==false && $request->hasFile('image')==false) {
      return redirect()->route('autosize');
    }elseif ($request->hasFile('image')==true) {
      $request->validate([
        'image'=>'required|image'
      ]);
      $filename = time().'.'.$request->file('image')->getClientOriginalName();
      session(['image'=>$filename]);
      Image::make($request->file('image'))->save(public_path('images/'.$filename));
      Image::make($request->file('image'))->resize(192, 192)->save(public_path('images/single-passportsize-'.$filename));
      return response()->download(public_path('images/single-passportsize-'.$filename))->deleteFileAfterSend(true);
    }elseif (session()->has('image')==true && $request->hasFile('image')==false) {
      $filename = public_path('images/single-passportsize-'.session('image'));
      Image::make(file_get_contents(public_path('images/'.session('image'))))->resize(192, 192)->save($filename);
      return response()->download($filename)->deleteFileAfterSend(true);
    }else {
      return redirect()->route('welcome');
    }
  }

}
