<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ChangetoController extends Controller
{
  public function index(){
    return view('pages.changeto');
  }

  public function changeto(Request $request){
    $filename = public_path('images/'.time().'.'.$request->changeto);
    Image::make($request->file('image'))->encode('png')->save($filename);
    return response()->download($filename)->deleteFileAfterSend(true);
  }


}
