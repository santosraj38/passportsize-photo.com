@extends('layouts.app')

@section('head')

  <title>Crop | Resize Image Online 100% Free</title>

  <meta name="keywords" content="crop image online,cutting images online, photo crop editor free download,crop picture into circle online,online photo editor,resize image,circle crop photo, online photo resizer in pixels">
  <meta name="description" content="Upload image and start cropping image. You can resize them and convert for passport size photo and get passport size photo for printing. This is 100% free and geneuine. No registration required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Crop | Resize Image Online 100% Free">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('cropimageuploadpage')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Upload image and start cropping image. You can resize them and convert for passport size photo and get passport size photo for printing. This is 100% free and geneuine. No registration required.">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<style>
  #cropper{
    border:4px dashed purple;
    min-width: 50px;
    min-height: 50px;
    width: 250px;
    height: 250px;
    background-color: inherit;

  }
</style>
@endsection

@section('content')

  <div class="ui stackable grid">
    <div class="eleven wide column">
        <div id="ajax">

        </div>



        <div id="cropcontainer" data-width="{{getimagesize(public_path('images/').session('image'))[0]}}" data-height="{{getimagesize(public_path('images/').session('image'))[1]}}"  style="width:100%;border:1px solid grey;display: inline-block;background-image: url('{{asset('images/'.session('image'))}}');background-size: 100% auto;min-height:500px;">
        <!--  <img  id="image" class="ui-widget-content" data-width="{{getimagesize(public_path('images/').session('image'))[0]}}" data-height="{{getimagesize(public_path('images/').session('image'))[1]}}"  src="{{asset('images/'.session('image'))}}" alt="Image To Crop" style="width:100%;height:auto;"/>
-->
          <div id="cropper" class="ui-widget-content" style="width:250px;height:250px;background-color:inherit;">

          </div>
        </div>




    </div>
    <div class="five wide column">
      <div class="ui red header">
        Crop Image Hints
      </div>
      <div class="ui bulleted list">
        <div class="item">Select Image</div>
        <div class="item">Select image within rectangle to be cropped</div>
        <div class="item">So simple, Its done</div>
      </div>
      {!! Form::open(['method' => 'POST', 'route' => 'cropimageprocess', 'class' => 'ui tiny form','files'=>'true']) !!}

      {!! Form::hidden('x', null) !!}
      {!! Form::hidden('y', null) !!}
      {!! Form::hidden('width', null) !!}
      {!! Form::hidden('height', null) !!}

      {!! Form::submit("Crop Image", ['class' => 'ui large fluid positive button','style'=>'visibility:hidden','id'=>'cropbtn']) !!}
      {!! Form::close() !!}
      <br>
      <a id="crop" class="ui huge fluid primary button"><i class="crop icon"></i>Crop</a>
      <div class="ui divider"></div>

    </div>

  </div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

  <script type="text/javascript">

  $('[name="cropimage"]').change(function(e){
    var files = e.target.files;

    if (files.length<2) {
      $.each(files,function(i,file){
        if (file.size>99097153) {
          alert('File size larger than 20MB');
        }else {
          var reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function(e){
            var template = '<img id="img" class="resizable draggable ui fluid image" src="'+e.target.result+'" width="auto" height="20vh" />';
            //$('#viewcropimage').html(template+'<div id="resizable" class="ui-widget-content resizable draggable" style="border: 1px solid black"></div>');

          };
        }

      });
    }else {
      alert('Choose Only One Image')
    }
    //var width = img.clientWidth();
    //var height = img.clientHeight();

  });

  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      var imgwidth = Number($('#cropcontainer').attr('data-width'));
      var width = $('#cropcontainer').width();
      var scale = imgwidth/width;
      var imgheight = Number($('#cropcontainer').attr('data-height'));
      var height = imgheight/scale;console.log(height);
      $('#cropcontainer').css("min-height",height);

    });
  </script>
  <script>
$(document).ready(function(){

  $( "#cropper" ).position({
  my: "left top",
  at: "left top",
  of: "#cropcontainer"
  });
 var imageheight = $('#image').height();
 $('#cropcontainer').css({'height':imageheight,'background-color': 'inherit'});

});
$( function() {

  $('#cropper').resizable({
    containment : '#cropcontainer',
    helper : 'ui-resizable-helper',
    ghost : false,
  }).draggable({
    droppable : '#cropcontainer',
    containment : '#cropcontainer',
  });
});
</script>
<script type="text/javascript">
$('#crop').click(function(){
  crop()
});
/*
function crop(){
  var orgimgwidth = Number($('#crop').attr('data-width'));
  var orgimgheight = Number($('#image').attr('data-height'));
  var curimgwidth = Number($('#image').width());
  var scale = orgimgwidth/curimgwidth;
  var cropperwidth = Number($('#cropper').width())*scale;
  var cropperheight = Number($('#cropper').height())*scale;
  var img_x_coordinate = Number($('#image').position().left);
  var img_y_coordinate = Number($('#image').position().top);
  var cropper_x_coordinate = Number($('#cropper').position().left);
  var cropper_y_coordinate = Number($('#cropper').position().top);

  var orgcropperx_coordinate = (cropper_x_coordinate-img_x_coordinate)*scale;
  var orgcroppery_coordinate = (cropper_y_coordinate - img_y_coordinate)*scale;

  $('[name="x"]').val(Math.round(orgcropperx_coordinate));
  $('[name="y"]').val(Math.round(orgcroppery_coordinate));
  $('[name="width"]').val(Math.round(cropperwidth));
  $('[name="height"]').val(Math.round(cropperheight));
  $('#cropbtn').trigger('click');
  $('#cropbtn').attr('id','changed');
}
*/

function crop(){
  var orgimgwidth = Number($('#cropcontainer').attr('data-width'));
  var orgimgheight = Number($('#cropcontainer').attr('data-height'));
  var curimgwidth = Number($('#cropcontainer').width());
  var scale = orgimgwidth/curimgwidth;
  var cropperwidth = Number($('#cropper').width())*scale;
  var cropperheight = Number($('#cropper').height())*scale;
  var img_x_coordinate = Number($('#cropcontainer').position().left);
  var img_y_coordinate = Number($('#cropcontainer').position().top);
  var cropper_x_coordinate = Number($('#cropper').position().left);
  var cropper_y_coordinate = Number($('#cropper').position().top);

  var orgcropperx_coordinate = (cropper_x_coordinate-img_x_coordinate)*scale;
  var orgcroppery_coordinate = (cropper_y_coordinate - img_y_coordinate)*scale;

  $('[name="x"]').val(Math.round(orgcropperx_coordinate));
  $('[name="y"]').val(Math.round(orgcroppery_coordinate));
  $('[name="width"]').val(Math.round(cropperwidth));
  $('[name="height"]').val(Math.round(cropperheight));
  $('#cropbtn').trigger('click');
  $('#cropbtn').attr('id','changed');
}

</script>
@endsection
