@extends('layouts.app')

@section('head')


    <title>Remove Background From Image</title>

    <meta name="keywords" content="remove background from image, background burner,how to remove background from image">
    <meta name="description" content="Remove background from image and replace it with different color for your passport size photo.">

    <!--Facebook Sharing and likes -->
    <meta property="og:title"  content="Remove Background From Image">
    <meta property="og:type"  content="website">
    <meta property="og:url"  content="{{route('backgroundupload')}}">
    <meta property="og:image"  content="">
    <meta property="og:description"  content="Remove background from image and replace it with different color for your passport size photo.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

@endsection

@section('content')

  <div class="ui stackable grid">
    <div class="eleven wide column">
        <div id="ajax">

        </div>



        <div id="cropcontainer" data-width="{{getimagesize(public_path('images/').session('image'))[0]}}" data-height="{{getimagesize(public_path('images/').session('image'))[1]}}"  style="width:100%;border:1px solid grey;display: inline-block;background-image: url('{{asset('images/'.session('image'))}}');background-size: 100% auto;min-height:500px;">
        <!--  <img  id="image" class="ui-widget-content" data-width="{{getimagesize(public_path('images/').session('image'))[0]}}" data-height="{{getimagesize(public_path('images/').session('image'))[1]}}"  src="{{asset('images/'.session('image'))}}" alt="Image To Crop" style="width:100%;height:auto;"/>
-->

        </div>




    </div>
    <div class="five wide column">
      <div class="ui red header">
        Remove Background From Image
      </div>
      <div class="ui bulleted list">
        <div class="item">Click around body</div>
        <div class="item">So simple, Its done</div>
      </div>
      <div class="ui divider"></div>
      {!! Form::open(['method' => 'POST', 'route' => 'backgroundprocess', 'class' => 'ui tiny form','files'=>'true','id'=>'pixelform']) !!}
        <div class="ui field">
          <div class="form-group{{ $errors->has('backgroundcolor') ? ' has-error' : '' }}">
              {!! Form::label('backgroundcolor', 'Background Color') !!}
              {!! Form::color('backgroundcolor', '#FF0000', ['class' => 'form-control', 'required' => 'required','style'=>'width:100%;height:50px']) !!}
              <small class="text-danger">{{ $errors->first('backgroundcolor') }}</small>
          </div>
        </div>

      {!! Form::submit("Remove Background", ['class' => 'ui large fluid positive button','style'=>'visibility:hidden','id'=>'backgroundremovebtn']) !!}
      {!! Form::close() !!}
      <a id="cropx" class="ui huge fluid primary button"><i class="eraser icon"></i>Remove Background</a>
      <div class="ui divider"></div>

    </div>

  </div>

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    var imgwidth = Number($('#cropcontainer').attr('data-width'));
    var width = $('#cropcontainer').width();
    var scale = imgwidth/width;
    var imgheight = Number($('#cropcontainer').attr('data-height'));
    var height = imgheight/scale;
    $('#cropcontainer').css("min-height",height);

  });
</script>
<script type="text/javascript">
$('#cropcontainer').click(function(event){
  var inputvalue = $('[name="boundry"]').val();
  var orgimagewidth = Number($('#cropcontainer').attr('data-width'));
  var orgimgheight = Number($('#cropcontainer').attr('data-height'));
  var curimgwidth = Number($('#cropcontainer').width());
  var scale = orgimagewidth/curimgwidth;
  var position = $('#cropcontainer').offset();

  var cursorX = event.pageX;
  var cursorY = event.pageY;
  var imageX = Math.round(cursorX-position.left)*scale;
  var imageY = Math.round(cursorY-position.top)*scale;
  var finalvalue = inputvalue+imageX+','+imageY+',';
  var inputx = '<input type="hidden" name="boundry[]" value="'+imageX+'"/>';
  var inputy = '<input type="hidden" name="boundry[]" value="'+imageY+'"/>';
  $('#pixelform').append(inputx+inputy);
  $('#cropcontainer').append('<div class="dotdivs" style="width:4px;height:4px;background-color:red;margin-top:'+Math.round(cursorY-position.top-2)+'px;margin-left:'+Math.round(cursorX-position.left-2)+'px;position:absolute"></div>')

});

$('#cropx').click(function(){
  $('#backgroundremovebtn').trigger('click');
});


</script>
@endsection
