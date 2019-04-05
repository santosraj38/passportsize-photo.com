<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class PassportprintController extends Controller
{

  public function index(){
    return view('pages.passportprint');
  }

  public function passportprint(Request $request){

        if (session()->has('image')==false && $request->hasFile('image')==false) {
          return redirect()->route('autoprint');
        }elseif ($request->hasFile('image')==true) {//work with uploaded file
          $request->validate([
            'image'=>'required|image'
          ]);

          $filename = time().'-'.$request->file('image')->getClientOriginalName();
          session(['image'=>$filename]);
          Image::make($request->file('image'))->save(public_path('images/'.$filename));
          $rowpath = public_path('images/row-'.time().'.png');
          $paperpath = public_path('images/printable-passportsize-'.time().'.png');
          Image::make($request->file('image'))->resize(180,180)->save(public_path('images/temp-'.$filename));
          $filename = public_path('images/temp-'.$filename);
          Image::canvas(384,192,'#fff')->insert($filename,'',6,6)->insert($filename,'',198,6)->save($rowpath);
          Image::canvas(384,576,'#fff')->insert($rowpath,'',0,0)->insert($rowpath,'',0,192)->insert($rowpath,'',0,384)->save($paperpath);
          File::delete($filename);
          File::delete($rowpath);
          return response()->download($paperpath)->deleteFileAfterSend(true);

        }elseif (session()->has('image')==true && $request->hasFile('image')==false) {//Work with session image
          $rowpath = public_path('images/row-'.time().'.png');
          $paperpath = public_path('images/printable-passportsize-'.time().'.png');
          Image::make(file_get_contents(public_path('images/'.session('image'))))->resize(180,180)->save(public_path('images/temp-'.session('image')));
          $filename = public_path('images/temp-'.session('image'));
          Image::canvas(384,192,'#fff')->insert($filename,'',6,6)->insert($filename,'',198,6)->save($rowpath);
          Image::canvas(384,576,'#fff')->insert($rowpath,'',0,0)->insert($rowpath,'',0,192)->insert($rowpath,'',0,384)->save($paperpath);
          File::delete($filename);
          File::delete($rowpath);
          return response()->download($paperpath)->deleteFileAfterSend(true);
        }else {
          return redirect()->route('welcome');
        }
  }

}
