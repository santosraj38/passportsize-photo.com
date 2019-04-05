@extends('layouts.app')

@section('head')
  <title>Create Auto|ID Size Photo Instantly 100% Free</title>

  <meta name="keywords" content="make passport photo, blue background passport photo online, how to print passport photos on 4x6 paper,passport photo size,how to print passport size photo,how to make passport size photo,passport size photo maker software free download">
  <meta name="description" content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. This serices are 100% free and geneuine. No sign up required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Create Auto|ID Size Photo Instantly 100% Free And Geneuine">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('autosize')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. This serices are 100% free and geneuine. No sign up required.">

@endsection

@section('content')
  <div class="ui stackable grid">
    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Convert To Auto Size Image
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'autosize', 'class' => 'ui tiny form','files'=>'true','id'=>'resizeform']) !!}
          @if (session()->has('image')==false)
            <div class="ui field">
              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Browse Image',['class'=>'ui large fluid button']) !!}
                  {!! Form::file('image', ['required' => 'required','accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>
              <div id="viewlogo">

              </div>
            </div>



                  {!! Form::submit("Get Auto Size Image", ['class' => 'ui fluid positive button','id'=>'submitresize']) !!}
            @else
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



                    {!! Form::submit("Use This Image For Auto|ID Size", ['class' => 'ui fluid positive button','id'=>'submitresize']) !!}
          @endif

        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Create Auto|ID Size Photo
      </div>
      <div class="ui bulleted list">
        <div class="item">Choose photo to convert to Auto|ID size photo</div>
        <div class="item">Upload, So Simple</div>

      </div>
      <div class="ui small header">
        Note
      </div>
      <div class="ui bulleted list">
        <div class="item">Default Auto|ID Size We Use is 1.208 inch * 1.375 inch</div>
        <div class="item">If its different size, <a href="{{route('resize')}}">Click Here For Different Size</a> </div>
      </div>
    </div>
  </div>

@endsection
