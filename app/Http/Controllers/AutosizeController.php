<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class AutosizeController extends Controller
{
  public function index(){
    return view('pages.autosize');
  }

  public function autosize(Request $request){
    if (session()->has('image')==false && $request->hasFile('image')==false) {
      return redirect()->route('autosize');
    }elseif (session()->has('image')==true && $request->hasFile('image')==true) {
      $request->validate([
        'image'=>'required|image'
      ]);
      $filename = time().'.'.$request->file('image')->getClientOriginalName();
      session(['image'=>$filename]);
      Image::make($request->file('image'))->save(public_path('images/'.$filename));
      $img = Image::make($request->file('image'))->resize(132, 170)->save(public_path('images/temp-'.$filename));
      return response()->download(public_path('images/temp-'.$filename))->deleteFileAfterSend(true);
    }elseif (session()->has('image')==true && $request->hasFile('image')==false) {
      $filename = public_path('images/autosize-'.session('image'));
      $img = Image::make(file_get_contents(public_path('images/'.session('image'))))->resize(132, 170)->save($filename);
      return response()->download($filename)->deleteFileAfterSend(true);
    }else {
      return redirect()->route('welcome');
    }

  }
}
