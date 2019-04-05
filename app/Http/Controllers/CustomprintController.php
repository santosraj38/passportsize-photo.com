<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use Redirect;
use Session;

class CustomprintController extends Controller
{
    public function index(){
      return view('pages.customprint');
    }

    public function customprint(Request $request){
      if (session()->has('image')==false && $request->hasFile('image')==false) {
        return redirect()->back();
      }elseif ($request->hasFile('image')==true) {
        if (session()->has('image')==true) {
          $request->validate([
            'row'=>'required|integer',
            'column'=>'required|integer',
            'height'=>'required|integer',
            'width'=>'required|integer',
            'pagewidth'=>'required|integer',
            'pageheight'=>'required|integer',
            'borderspacing'=>'required|integer'
          ]);
        }else {
          $request->validate([
            'row'=>'required|integer',
            'column'=>'required|integer',
            'image'=>'required|image',
            'height'=>'required|integer',
            'width'=>'required|integer',
            'pagewidth'=>'required|integer',
            'pageheight'=>'required|integer',
            'borderspacing'=>'required|integer'
          ]);
        }

        $sessionname = time().'-'.$request->file('image')->getClientOriginalName();
        $filename = public_path('images/temp-'.$request->file('image')->getClientOriginalName());
        $rowpath = public_path('images/row-'.time().'.png');
        $paperpath = public_path('images/paper-'.time().'.png');
        Image::make($request->file('image'))->save(public_path('images/'.$sessionname));
        session(['image'=>$sessionname]);
        Image::make($request->file('image'))->resize($request->width,$request->height)->save($filename);
        for ($i=0; $i < $request->column; $i++) {
          if ($i==0) {
            Image::canvas($request->pagewidth,$request->height+$request->borderspacing,'#fff')->insert($filename,'',$request->borderspacing,$request->borderspacing)->save($rowpath);
          }else {
            Image::make($rowpath)->insert($filename,'',$request->borderspacing+$request->width*$i+2*$request->borderspacing*$i,$request->borderspacing)->save($rowpath);
          }

        }

        for ($i=0; $i < $request->row; $i++) {
          if ($i==0) {
            Image::canvas($request->pagewidth,$request->pageheight,'#fff')->insert($rowpath,'',0,0)->save($paperpath);
          }else {
            Image::make($paperpath)->insert($rowpath,'',0,($request->height+$request->borderspacing*2)*$i)->save($paperpath);
          }
        }

        File::delete($filename);
        File::delete($rowpath);
        return response()->download($paperpath)->deleteFileAfterSend(true);
      }elseif (session()->has('image')==true && $request->hasFile('image')==false) {

        $rowpath = public_path('images/row-'.time().'.png');
        $paperpath = public_path('images/paper-'.time().'.png');
        $filename = public_path('images/temp-'.session('image'));
        Image::make(file_get_contents(public_path('images/'.session('image'))))->resize($request->width,$request->height)->save($filename);
        for ($i=0; $i < $request->column; $i++) {
          if ($i==0) {
            Image::canvas($request->pagewidth,$request->height+$request->borderspacing,'#fff')->insert($filename,'',$request->borderspacing,$request->borderspacing)->save($rowpath);
          }else {
            Image::make($rowpath)->insert($filename,'',$request->borderspacing+$request->width*$i+2*$request->borderspacing*$i,$request->borderspacing)->save($rowpath);
          }

        }

        for ($i=0; $i < $request->row; $i++) {
          if ($i==0) {
            Image::canvas($request->pagewidth,$request->pageheight,'#fff')->insert($rowpath,'',0,0)->save($paperpath);
          }else {
            Image::make($paperpath)->insert($rowpath,'',0,($request->height+$request->borderspacing*2)*$i)->save($paperpath);
          }
        }
        File::delete($filename);
        File::delete($rowpath);
        return response()->download($paperpath)->deleteFileAfterSend(true);
      }else {
        return redirect()->back();
      }

    }
}
