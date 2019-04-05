@extends('layouts.app')

@section('head')

  <title>Crop | Resize Image Online 100% Free</title>

  <meta name="keywords" content="crop image online,cutting images online, photo crop editor free download,crop picture into circle online,online photo editor,resize image,circle crop photo, online photo resizer in pixels">
  <meta name="description" content="Upload image and start cropping image. You can resize them and convert for passport size photo and get passport size photo for printing. This is 100% free and geneuine. No registration required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Crop | Resize Image Online 100% Free">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('cropimageupload')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Upload image and start cropping image. You can resize them and convert for passport size photo and get passport size photo for printing. This is 100% free and geneuine. No registration required.">

@endsection

@section('content')

  <div class="ui stackable grid">
    <div class="eight wide column">

      <div class="ui segment">
        <div class="ui header">
          Upload Image For Cropping
        </div>
        <div class="ui divider">

        </div>

        {!! Form::open(['method' => 'POST', 'route' => 'cropimageupload', 'class' => 'ui tiny form','files'=>'true']) !!}
          @if (session()->has('image'))
            <div class="ui field">
              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Change Image',['class'=>'ui large fluid button']) !!}
                  {!! Form::file('image', ['accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>
              <div id="viewlogo">

                  <img src="{{asset('images/'.session('image'))}}" width="200px" height="200px" alt="">
              </div>
            </div>
            {!! Form::submit("Use Image For Cropping", ['class' => 'ui fluid positive button']) !!}
            @else

          <div class="ui field">
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                {!! Form::label('image', 'Browse Image',['class'=>'ui large fluid button']) !!}
                {!! Form::file('image', ['required'=>'required','accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
                <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
            <div id="viewlogo">

            </div>
          </div>
          {!! Form::submit("Upload Image For Cropping", ['class' => 'ui fluid positive button']) !!}
            @endif





        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Crop Image
      </div>
      <div class="ui bulleted list">
        <div class="item">Select Image</div>
        <div class="item">Upload, you wil be redirected to another page for cropping</div>
      </div>

    </div>
  </div>

@endsection
