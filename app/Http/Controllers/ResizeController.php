<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Response;
use Redirect;
use Session;

class ResizeController extends Controller
{
  public function index(){
    return view('pages.resize');
  }

  public function resize(Request $request){
    if (session()->has('image')==false && $request->hasFile('image')==false) {
      return redirect()->back();
    }elseif ($request->hasFile('image')==true) {
      $request->validate([
        'height'=>'required|integer',
        'width'=>'required|integer',
        'image'=>'required|image'
      ]);
      $sessionname = time().'-'.$request->file('image')->getClientOriginalName();
      session(['image'=>$sessionname]);
      Image::make($request->file('image'))->save(public_path('images/'.$sessionname));
      $filename = public_path('images/resize-'.time().'.'.$request->file('image')->getClientOriginalExtension());
      Image::make($request->file('image'))->resize($request->width, $request->height)->save($filename);
      return response()->download($filename)->deleteFileAfterSend(true);

    }elseif (session()->has('image')==true && $request->hasFile('image')==false) {
      $filename = public_path('images/resize-'.session('image'));
      Image::make(file_get_contents(public_path('images/'.session('image'))))->resize($request->width, $request->height)->save($filename);
      return response()->download($filename)->deleteFileAfterSend(true);

    }else {
      return redirect()->route('welcome');
    }

  }
}
