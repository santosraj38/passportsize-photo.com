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
    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Resize Image
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'resize', 'class' => 'ui tiny form','files'=>'true','id'=>'resizeform']) !!}
          @if (session()->has('image')==true)
            <div class="ui field">
              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Browse Image',['class'=>'ui large fluid button']) !!}
                  {!! Form::file('image', ['accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>
              <div id="viewlogo">
                <img src="{{asset('images/'.session('image'))}}" width="200px" height="200px" alt="passportsize-photo.com">
              </div>
            </div>
            @else
              <div class="ui field">
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    {!! Form::label('image', 'Browse Image',['class'=>'ui large fluid button']) !!}
                    {!! Form::file('image', ['required' => 'required','accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>
                <div id="viewlogo">

                </div>
              </div>

          @endif


          <div class="ui two fields">

            <div class="ui field">
              <div class="form-group{{ $errors->has('width') ? ' has-error' : '' }}">
                  {!! Form::label('width', 'Width (px)') !!}
                  {!! Form::number('width', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('width') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                  {!! Form::label('height', 'Height (px)') !!}
                  {!! Form::number('height', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('height') }}</small>
              </div>
            </div>
          </div>


                {!! Form::submit("Resize Image", ['class' => 'ui fluid positive button','id'=>'submitresize']) !!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Process For Resizing Image
      </div>
      <div class="ui bulleted list">
        <div class="item">Choose Your Image</div>
        <div class="item">Set desired width and height in pixel</div>
        <div class="item">Click Resize</div>
        <div class="item">Everything is done wait for response image</div>
      </div>
    </div>
  </div>

@endsection
