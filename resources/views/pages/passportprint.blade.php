@extends('layouts.app')

@section('head')
  <title>Passport Size Photo Ready For Print Quick And Easy - 100% Free</title>

  <meta name="keywords" content="make passport photo, blue background passport photo online, how to print passport photos on 4x6 paper,passport photo size,how to print passport size photo,how to make passport size photo,passport size photo maker software free download">
  <meta name="description" content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. This serices are 100% free and geneuine. No sign up required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Passport Size Photo Ready For Print Quick And Easy - 100% Free">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('passportprint')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. These services are 100% free and geneuine. No registration required.">

@endsection

@section('content')
  <div class="ui stackable grid">
    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Convert To Passport Size For Printing
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'passportprint', 'class' => 'ui tiny form','files'=>'true','id'=>'resizeform']) !!}
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

                  {!! Form::submit("Use Image For Printable Passport Size Photo", ['class' => 'ui fluid positive button']) !!}
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

                    {!! Form::submit("Upload And Get Printable Passport Size Photo", ['class' => 'ui fluid positive button']) !!}
          @endif

        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Create Passport Size Photo Ready To Print
      </div>
      <div class="ui bulleted list">
        <div class="item">Choose a photo</div>
        <div class="item">Upload, that's it</div>

      </div>
      <div class="ui small header">
        Note
      </div>
      <div class="ui bulleted list">
        <div class="item">Default paper size 4 inch * 6 inch</div>
        <div class="item">Passport Image Size 2 inch * 2 inch including 6px as border|clearence </div>
        <div class="item">Different image width and papersize <a href="{{route('customprint')}}">Customize Here</a></div>
      </div>
    </div>
  </div>

@endsection
