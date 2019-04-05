<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;
use Session;

class AutobackgroundremoveController extends Controller
{
    public function index(){
    return view('pages.autobackgroundremove');
    }
    public function masktest(Request $request){
      $img = Image::make($request->file('image'))->greyscale();
      $imgmask = Image::make($request->file('image'))->mask($img,true);
      return $imgmask->response();
    }

    public function autoremove(Request $request){
      $filename = public_path('images/temporary-image-'.$request->file('image')->getClientOriginalName());
      Image::make($request->file('image'))->save($filename);
      $image_width = getimagesize($filename)[0];
      $image_height = getimagesize($filename)[1];
      $deleteable_colors = array();
      $safe_colors = array();
      $img = Image::make(file_get_contents($filename));
      $img->limitcolors(255,'#640000');
      return $img->response();
      //Gather deleteable  colors and safe colors
      for ($i=0; $i < 0.4*$image_height; $i++) {
        for ($j=0; $j < $image_width; $j++) {
          $pickedcolor = $img->pickColor($j, $i);
          $insert = 'rgba('.$pickedcolor[0].','.$pickedcolor[1].','.$pickedcolor[2].','.$pickedcolor[3].')';

          if ($i<0.2*$image_height) {
            if (in_array($insert,$deleteable_colors)==false) {
              array_push($deleteable_colors,$insert);
            }
          }elseif ($j<0.2*$image_width && $i<0.4*$image_height || $j>0.8*$image_width && $i<0.4*$image_height) {
            if (in_array($insert,$deleteable_colors)==false) {
              array_push($deleteable_colors,$insert);
            }
          }
        }
      }
      for ($i=0; $i < $image_height; $i++) {
        for ($j=0; $j < $image_width; $j++) {
          $pickedcolor = $img->pickColor($j, $i);
          $insert = 'rgba('.$pickedcolor[0].','.$pickedcolor[1].','.$pickedcolor[2].','.$pickedcolor[3].')';
          if (in_array($insert,$deleteable_colors)==true) {
            $img->fill('#cccccc',25,25);
          }
        }
      }
      return $img->response();
    }
}
