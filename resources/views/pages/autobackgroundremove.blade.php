@extends('layouts.app')

@section('head')
  <title>Resize Your Image To Your Desired Dimension In Few Seconds</title>

  <meta name="keywords" content="resize image without losing quality,resize image in cm,resize image in kb,resize image pixels,resize photo for facebook cover online free, reduce image file size, resize photo to 4x4,increase image size. This serices are 100% free and geneuine. No sign up required.">
  <meta name="description" content="Resize your photo to a new desired dimension. A simple online service to resize images. Also support passport or ID size printable photo.No registration Required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Resize Your Image To Your Desired Dimension In Few Seconds">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('resize')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Resize your photo to a new desired dimension. A simple online service to resize images. Also support passport or ID size printable photo. This serices are 100% free and geneuine. No sign up required.">

@endsection

@section('content')
  <div class="ui stackable grid">
    <div class="ten wide column">
      <div class="ui form" id="form">

        <div class="ui field">
          <div class="form-group{{ $errors->has('canvasimage') ? ' has-error' : '' }}">
              {!! Form::label('canvasimage', 'Browse Image',['class'=>'ui large fluid button']) !!}
              {!! Form::file('canvasimage', ['required' => 'required','accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden;height:0px','multiple']) !!}
              <small class="text-danger">{{ $errors->first('canvasimage') }}</small>
          </div>

        </div>
        <div class="ui four fields">
          <div class="ui field">
            <div class="form-group{{ $errors->has('brushsize') ? ' has-error' : '' }}">
                {!! Form::label('brushsize', 'Brush Size') !!}
                {!! Form::select('brushsize', ['2'=>'2px','4'=>'4px','8'=>'8px','16'=>'16px','32'=>'32px','64'=>'64px'], '32', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('brushsize') }}</small>
            </div>
          </div>
          <div class="ui field">
            <div class="form-group{{ $errors->has('brushcolor') ? ' has-error' : '' }}">
                {!! Form::label('brushcolor', 'Brush/Background Color') !!}
                {!! Form::color('brushcolor', '#FFFFFF', ['class'=>'ui fluid', 'required' => 'required','style'=>'width:100%;height:40px;border-radius:5px']) !!}
                <small class="text-danger">{{ $errors->first('brushcolor') }}</small>
            </div>
          </div>

          <div class="ui field">
            <div class="form-group{{ $errors->has('transparency') ? ' has-error' : '' }}">
                {!! Form::label('transparency', 'Transparency (%)') !!}
                {!! Form::number('transparency', '0', ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('transparency') }}</small>
            </div>
          </div>
          <div class="ui field">
            <div class="form-group{{ $errors->has('threshold') ? ' has-error' : '' }}">
                {!! Form::label('threshold', 'Threshold') !!}
                {!! Form::text('threshold', '15', ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('threshold') }}</small>
            </div>
          </div>


        </div>
      </div>
      <div class="">
        <div class="ui small actionbutton button" id="paintbrush"><i class="paint brush icon"></i>Paint</div>
        <div class="ui small actionbutton button" id="eraser"><i class="eraser red icon"></i>BG Eraser</div>
        <div class="ui small actionbutton button" id="masseraser"><i class="eraser blue icon"></i>Large BG Eraser</div>
        <div class="ui small actionbutton button" id="refill"><i class="eraser pink icon"></i>Refill Original Image</div>
      </div>
      <br>
      <div style="visibility:hidden;width:0px;height:0px">
        <canvas id="orgcanvas" width="600px" height="600px"></canvas>
      </div>
        <canvas id="mycanvas" width="600px" height="600px" style="border:1px solid #d3d3d3">Your Browser Does Not Support Canvas</canvas>

    </div>
    <div class="six wide column">

      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Remove Image Background
      </div>
      <div class="ui bulleted list">
        <div class="item">Paint over the large area</div>
        <div class="item">Eraser erase the color under mouse from area of brush</div>
        <div class="item">Mass eraser helps to remove color to maximum area (Works if image has same color in large area )</div>
      </div>

      <div id="upload" class="ui button large"><i class="upload icon"></i>Upload Image</div>

      <div class="ui form"  style="visibility:hidden" height="0px" width="0px">

        <div class="ui field">
          <div class="form-group{{ $errors->has('brushcolorrgba') ? ' has-error' : '' }}">
              {!! Form::text('brushcolorrgba', null, ['style' => 'visibility:none', 'required' => 'required','id'=>'brushcolorrgba']) !!}
              <small class="text-danger">{{ $errors->first('brushcolorrgba') }}</small>
          </div>
        </div>

        <div class="ui field">
          <div class="form-group{{ $errors->has('activeaction') ? ' has-error' : '' }}">
              {!! Form::label('activeaction', 'Active Action') !!}
              {!! Form::text('activeaction', 'paintbrush', ['class' => 'form-control', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('activeaction') }}</small>
          </div>
        </div>
        <div class="ui field">
          <div class="form-group{{ $errors->has('mousestatus') ? ' has-error' : '' }}">
              {!! Form::label('mousestatus', 'Mouse Status') !!}
              {!! Form::text('mousestatus', 'mouseup', ['class' => 'form-control', 'required' => 'required','id'=>'mousestatus']) !!}
              <small class="text-danger">{{ $errors->first('mousestatus') }}</small>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script type="text/javascript">
  $('[name="canvasimage"]').change(function(e){
    var files = e.target.files;

    if (files.length<2) {
      $.each(files,function(i,file){
        if (file.size>99097153) {
          alert('File size larger than 20MB');
        }else {
          var reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function(e){
            var orgcanvas = document.getElementById('orgcanvas');
            var canvas = document.getElementById('mycanvas');
            var width = $('#form').width();
            $('#mycanvas').attr('width',width);
            if (canvas.getContext("2d")) {
              var ctx = canvas.getContext("2d");
              var image = new Image;
              image.src = e.target.result;
              image.onload = function() {
                if (orgcanvas.getContext('2d')) {
                  var orgcontext = orgcanvas.getContext('2d');
                  var naturalwidth = image.naturalWidth;
                  var naturalheight = image.naturalHeight;
                  var scale = naturalwidth/width;
                  $('#mycanvas').attr('height',naturalheight/scale);
                  $('#orgcanvas').attr('height',naturalheight/scale);
                  $('#orgcanvas').attr('width',width);
                  orgcontext.drawImage(image,0,0,width,naturalheight/scale);
                  ctx.drawImage(image,0,0,width,naturalheight/scale);
                }

                };


            }

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
    $('#upload').click(function(){
      var image = document.getElementById('mycanvas').toDataURL().split(',')[1];
      $('#ajax').load('{{route('background')}}',{_token:'{{csrf_token()}}',_method:'POST',image:image})

    });
  </script>
<script type = "text/javascript">
    $(document).ready(function(){
      var width = $('#form').width();
      $('#mycanvas').attr('width',width);
      $('#orgcanvas').attr('width',width);
      $('#brushcolorrgba').val(convertHex());
    });

    $('#mycanvas').hover(function(event){
      $('#mycanvas').css('cursor','url({{asset('Eraser Icon.png')}}) 64 64,auto');
    });

    $(document).on('mousemove','#mycanvas',function(event){
      var action = $('[name="activeaction"]').val();
      if (action=='paintbrush' || action=='refill') {

        if ($('#mousestatus').val()=='mousedown') {
          window[action](event);
        }
      }else if (checkbackgroundcolor(event)=='false' && action != 'paintbrush') {
        if ($('#mousestatus').val()=='mousedown') {
          window[action](event);
        }
      }

    });
    $('.actionbutton').click(function(){
      var action = $(this).attr('id');
      $('[name="activeaction"]').val(action);
    });
    $('#mycanvas').mousedown(function(){
      $('#mousestatus').val('mousedown');
    });

    $('#mycanvas').mouseup(function(){
      $('#mousestatus').val('mouseup');
    });

    $('#brushcolor,#transparency').change(function(){
      $('#brushcolorrgba').val(convertHex());
    });

    function convertHex(){
      var brushcolor = $('#brushcolor').val();
      var opacity = Math.round(Math.abs((100 - $('#transparency').val())/100*255));
      hex = brushcolor.replace('#','');
      r = parseInt(hex.substring(0,2), 16);
      g = parseInt(hex.substring(2,4), 16);
      b = parseInt(hex.substring(4,6), 16);

      result = 'rgba('+r+','+g+','+b+','+opacity+')';
      return result;
    }


    $('#mycanvas').click(function(event){
      //fillimage(event);
      //eraser(event);
      //imagedata(event);
      var action = $('[name="activeaction"]').val();
      if (action=='paintbrush' || action=='refill') {
          window[action](event);
      }else if (checkbackgroundcolor(event)=='false' && action != 'paintbrush') {
        window[action](event);
      }

    });

  function checkbackgroundcolor(event){
    var position = $('#mycanvas').offset();
    var cursorX = event.pageX;
    var cursorY = event.pageY;
    var imageX = Math.round(cursorX-position.left);
    var imageY = Math.round(cursorY-position.top);
    var canvas = document.getElementById('mycanvas');
    var backgroundcolor = $('[name="brushcolorrgba"]').val();
    if (canvas.getContext('2d')) {
      var context = canvas.getContext("2d");

      var imagedata = context.getImageData(imageX,imageY,1,1);
      var mousecolor = 'rgba('+imagedata.data[0]+','+imagedata.data[1]+','+imagedata.data[2]+','+imagedata.data[3]+')';
      if (backgroundcolor==mousecolor) {
        return 'true';
      }else {
        return 'false';
      }


    }
  }

    function refill(event){
      var brushsize = $('[name="brushsize"]').val();
      var position = $('#mycanvas').offset();
      var cursorX = event.pageX;
      var cursorY = event.pageY;
      var imageX = Math.round(cursorX-position.left);
      var imageY = Math.round(cursorY-position.top);


      var orgcanvas = document.getElementById('orgcanvas');

      if (orgcanvas.getContext('2d')) {
        var context = orgcanvas.getContext("2d");

        var xleft = imageX-brushsize/2;
        var xright = Number(xleft)+Number(brushsize);
        var ytop = imageY-brushsize/2;
        var ybuttom = Number(imageY)+Number(brushsize);

        var imagedata = context.getImageData(xleft,ytop,xright-xleft,ybuttom-ytop);

        var mycanvas = document.getElementById('mycanvas');
        if (mycanvas.getContext('2d')) {
          var newcontext = mycanvas.getContext('2d');
        newcontext.putImageData(imagedata, xleft, ytop);
        }
      }
    }

    function eraser(event){
      var brushsize = $('[name="brushsize"]').val();
      var fillcolor = $('[name="brushcolorrgba"]').val();
      var rgba = fillcolor.replace('rgba(','').replace(')','').split(',');
      var maxX = $('#mycanvas').width();
      var maxY = $('#mycanvas').height();
      var position = $('#mycanvas').offset();
      var cursorX = event.pageX;
      var cursorY = event.pageY;
      var imageX = Math.round(cursorX-position.left);
      var imageY = Math.round(cursorY-position.top);
      var threshold = $('[name="threshold"]').val();
      $('#mousecord').html(imageX+', '+imageY);

      var canvas = document.getElementById('mycanvas');

      if (canvas.getContext('2d')) {
        var context = canvas.getContext("2d");
        var majorcolor = context.getImageData(imageX,imageY,1,1);

        var xleft = imageX-brushsize/2;
        var xright = Number(xleft)+Number(brushsize);
        var ytop = imageY-brushsize/2;
        var ybuttom = Number(imageY)+Number(brushsize);

        var imagedata = context.getImageData(xleft,ytop,xright-xleft,ybuttom-ytop);

        var newcanvas = document.createElement('canvas');
        newcanvas.width = xright-xleft;
        newcanvas.height = ybuttom-ytop;
        if (newcanvas.getContext('2d')) {
          var newcontext = newcanvas.getContext('2d');
          newcontext.fillStyle = fillcolor;
          newcontext.fillRect(0,0,xright-xleft,ybuttom-ytop);
          newcontext.fill();
          var newimagedata = newcontext.getImageData(0,0,xright-xleft,ybuttom-ytop);//console.log('New Image Data');console.log(newimagedata.data);

          for (var i = 0; i < imagedata.data.length/4; i++) {

            if (Math.abs(majorcolor.data[0]-imagedata.data[Number(4)*Number(i)]) < threshold && Math.abs(majorcolor.data[1]-imagedata.data[Number(4)*Number(i)+Number(1)]) < threshold && Math.abs(majorcolor.data[2]-imagedata.data[Number(4)*Number(i)+Number(2)])<threshold) {
              newimagedata.data[Number(4)*Number(i)] =rgba[0];
              newimagedata.data[Number(4)*Number(i)+Number(1)] =rgba[1];
              newimagedata.data[Number(4)*Number(i)+Number(2)] =rgba[2];
              newimagedata.data[Number(4)*Number(i)+Number(3)] =rgba[3];
            }
            else {
              newimagedata.data[Number(4)*Number(i)] =imagedata.data[Number(4)*Number(i)];
              newimagedata.data[Number(4)*Number(i)+Number(1)] =imagedata.data[Number(4)*Number(i)+Number(1)];
              newimagedata.data[Number(4)*Number(i)+Number(2)] =imagedata.data[Number(4)*Number(i)+Number(2)];
              newimagedata.data[Number(4)*Number(i)+Number(3)] =imagedata.data[Number(4)*Number(i)+Number(3)];

            }
          }

        newcontext.putImageData(newimagedata, 0, 0);
        }

        context.drawImage(newcanvas,xleft,ytop,xright-xleft,ybuttom-ytop);


      }
    }

    function masseraser(event){
      var fillcolor = $('[name="brushcolorrgba"]').val();
      var rgba = fillcolor.replace('rgba(','').replace(')','').split(',');
      var maxX = $('#mycanvas').width();
      var maxY = $('#mycanvas').height();
      var position = $('#mycanvas').offset();
      var cursorX = event.pageX;
      var cursorY = event.pageY;
      var imageX = Math.round(cursorX-position.left);
      var imageY = Math.round(cursorY-position.top);
      var threshold = $('[name="threshold"]').val();
      $('#mousecord').html(imageX+', '+imageY);
      var canvas = document.getElementById('mycanvas');

      if (canvas.getContext('2d')) {
        var context = canvas.getContext("2d");
        var majorcolor = context.getImageData(imageX,imageY,1,1);


        var xleft = imageX-1;
        var xright = Number(imageX)+Number(1);
        var ytop = imageY-1;
        var ybuttom = Number(imageY)+Number(1);

        //Get X Most Left Position
        var condition = 'true';
        while (condition=='true') {
          var xleftcolor = context.getImageData(xleft,imageY,1,1);
          var checkcoloragain = checkcolor(majorcolor,xleftcolor,threshold);
          if (checkcoloragain=='true') {

          }else {
            var condition = 'false';
          }


          if (xleft<1) {
            var condition = 'false';
          }else {
            xleft = xleft-1;
          }

        }

        //Get X Most Right Position
        var condition = 'true';
        while (condition=='true') {
          var xrightcolor = context.getImageData(xright,imageY,1,1);
          var checkcoloragain = checkcolor(majorcolor,xrightcolor,threshold);
          if (checkcoloragain=='true') {

          }else {
            var condition = 'false';
          }

          var xright = Number(xright)+Number(1);
          if (xright>maxX) {
            var condition = 'false';
          }

        }

        //Get Y Most Top Position
        var condition = 'true';
        while (condition=='true') {
          var ytopcolor = context.getImageData(imageX,ytop,1,1);
          var checkcoloragain = checkcolor(majorcolor,ytopcolor,threshold);
          if (checkcoloragain=='true') {

          }else {
            var condition = 'false';
          }

          if (ytop<1) {
            var condition = 'false';
          }else {
            var ytop = ytop-1;
          }

        }

        //Get Y Most Bottom Position
        var condition = 'true';
        while (condition=='true') {
          var ybottomcolor = context.getImageData(imageX,ybuttom,1,1);
          var checkcoloragain = checkcolor(majorcolor,ybottomcolor,threshold);
          if (checkcoloragain=='true') {

          }else {
            var condition = 'false';
          }

          var ybuttom = Number(ybuttom)+Number(1);
          if (ybuttom>maxY) {
            var condition = 'false';
          }

        }
        var imagedata = context.getImageData(xleft,ytop,xright-xleft,ybuttom-ytop);

        var newcanvas = document.createElement('canvas');
        newcanvas.width = xright-xleft;
        newcanvas.height = ybuttom-ytop;
        if (newcanvas.getContext('2d')) {
          var newcontext = newcanvas.getContext('2d');
          newcontext.fillStyle = fillcolor;
          newcontext.fillRect(0,0,xright-xleft,ybuttom-ytop);
          newcontext.fill();
          var newimagedata = newcontext.getImageData(0,0,xright-xleft,ybuttom-ytop);//console.log('New Image Data');console.log(newimagedata.data);

          for (var i = 0; i < imagedata.data.length/4; i++) {

            if (Math.abs(majorcolor.data[0]-imagedata.data[Number(4)*Number(i)]) < threshold && Math.abs(majorcolor.data[1]-imagedata.data[Number(4)*Number(i)+Number(1)]) < threshold && Math.abs(majorcolor.data[2]-imagedata.data[Number(4)*Number(i)+Number(2)])<threshold) {
              newimagedata.data[Number(4)*Number(i)] =rgba[0];
              newimagedata.data[Number(4)*Number(i)+Number(1)] =rgba[1];
              newimagedata.data[Number(4)*Number(i)+Number(2)] =rgba[2];
              newimagedata.data[Number(4)*Number(i)+Number(3)] =rgba[3];
            }
            else {
              newimagedata.data[Number(4)*Number(i)] =imagedata.data[Number(4)*Number(i)];
              newimagedata.data[Number(4)*Number(i)+Number(1)] =imagedata.data[Number(4)*Number(i)+Number(1)];
              newimagedata.data[Number(4)*Number(i)+Number(2)] =imagedata.data[Number(4)*Number(i)+Number(2)];
              newimagedata.data[Number(4)*Number(i)+Number(3)] =imagedata.data[Number(4)*Number(i)+Number(3)];

            }
          }

        newcontext.putImageData(newimagedata, 0, 0);
        }

        context.drawImage(newcanvas,xleft,ytop,xright-xleft,ybuttom-ytop);


      }
    }

    function checkcolor(majorcolor,checkcolor,threshold){
      if (Math.abs(majorcolor.data[0]-checkcolor.data[0]) < threshold && Math.abs(majorcolor.data[1]-checkcolor.data[1]) < threshold && Math.abs(majorcolor.data[2]-checkcolor.data[2])<threshold) {
        return 'true';
      }else {
        return 'false';
      }
    }




/*
    function imagedata(event){
      var brushsize = $('[name="brushsize"]').val();
      var brushcolor = $('[name="brushcolor"]').val();
      var transparency = $('[name="transparency"]').val();
      var position = $('#mycanvas').offset();
      var cursorX = event.pageX;
      var cursorY = event.pageY;
      var imageX = Math.round(cursorX-position.left);
      var imageY = Math.round(cursorY-position.top);
      $('#mousecord').html(imageX+', '+imageY);
      var canvas = document.getElementById('mycanvas');
      var radius = brushsize;
      var previousX = $('[name="previousX"]').val();
      var previousY = $('[name="previousY"]').val();
      if (canvas.getContext('2d')) {
        var context = canvas.getContext("2d");
        var a = context.getImageData(imageX-brushsize,imageY-brushsize,1,1);
        var b = context.getImageData(Number(imageX)+Number(brushsize),imageY-brushsize,1,1);
        var c = context.getImageData(imageX-brushsize,Number(imageY)+Number(brushsize),1,1);
        var d = context.getImageData(Number(imageX)+Number(brushsize),Number(imageY)+Number(brushsize),1,1);
        var redavg = (Number(a.data[0])+Number(b.data[0])+Number(c.data[0])+Number(d.data[0]))/4;
        var greenavg = (Number(a.data[1])+Number(b.data[1])+Number(c.data[1])+Number(d.data[1]))/4;
        var blueavg = (Number(a.data[2])+Number(b.data[2])+Number(c.data[2])+Number(d.data[2]))/4;
        var alphaavg = (Number(a.data[3])+Number(b.data[3])+Number(c.data[3])+Number(d.data[3]))/4;

        var majorcolor = context.getImageData(imageX,imageY,1,1);console.log(redavg-majorcolor.data[0]);

        if (majorcolor.data[0]-redavg < 10 && majorcolor.data[1]-greenavg <10 && majorcolor.data[2]-greenavg < 10 && majorcolor.data[3] - alphaavg < 10) {

          context.fillStyle = brushcolor;
          context.beginPath();
          context.moveTo(previousX,previousY);
          context.lineTo(imageX,imageY);
          context.closePath();
          context.stroke();
          context.fill();
          $('[name="previousX"]').val(imageX);
          $('[name="previousY"]').val(imageY);
        }
        //context.fillStyle = brushcolor;
        //context.fillRect(imageX-brushsize/2,imageY-brushsize/2,brushsize,brushsize);
        //context.fillStyle = '#FFFFFF';
        //context.fillRect(imageX-brushsize/4,imageY-brushsize/4,brushsize/2,brushsize/2)
        //console.log(imagedataarray.data)
      }
    }*/

    function paintbrush(event){
      var brushsize = $('[name="brushsize"]').val();
      var brushcolor = $('[name="brushcolor"]').val();
      var fillcolor = $('[name="brushcolorrgba"]').val();
      var transparency = $('[name="transparency"]').val();
      var position = $('#mycanvas').offset();
      var cursorX = event.pageX;
      var cursorY = event.pageY;
      var imageX = Math.round(cursorX-position.left);
      var imageY = Math.round(cursorY-position.top);
      $('#mousecord').html(imageX+' '+imageY);
      var canvas = document.getElementById('mycanvas');
      var radius = brushsize;
      if (canvas.getContext('2d')) {
        var context = canvas.getContext("2d");
        context.lineWidth = 6;
        context.beginPath();
        context.fillStyle = fillcolor;
        context.arc(imageX,imageY,radius,0,2*Math.PI);
        context.fill();
        //context.fillRect(imageX-brushsize/2,imageY-brushsize/2,brushsize,brushsize);
      }

    }


 </script>
<script type="text/javascript">
  $('.ui.checkbox').checkbox();
</script>
@endsection
