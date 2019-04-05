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

@endsection

@section('content')

  <div class="ui stackable grid">
    <div class="eight wide column">

      <div class="ui segment">
        <div class="ui header">
          Remove Background From Image
        </div>
        <div class="ui divider">

        </div>

        {!! Form::open(['method' => 'POST', 'route' => 'backgroundupload', 'class' => 'ui tiny form','files'=>'true']) !!}
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
            {!! Form::submit("Remove Background From This Image", ['class' => 'ui fluid positive button']) !!}
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
          {!! Form::submit("Upload Image For Removing Background", ['class' => 'ui fluid positive button']) !!}
            @endif





        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Remove Image Background
      </div>
      <div class="ui bulleted list">
        <div class="item">Select Image</div>
        <div class="item">Upload, you wil be redirected to another page for removing background</div>
      </div>

    </div>
  </div>

@endsection
