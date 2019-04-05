@extends('layouts.app')

@section('head')
  <title>Text To Image | Create Image From Text Online : 100% FREE</title>

  <meta name="keywords" content="text to image, create image from text,long text to image,text to image generator online free,text to image ai, convert text to image online,text to image converter app">
  <meta name="description" content="Let your words get into image. Choose background, font, font size, font color, image width, image height and many other things to let you convert your text to image. These services are 100% free and geneuine. No Registration Required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Text To Image | Create Image From Text : 100% FREE">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('texttoimage')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Let your words get into image. Choose background, font, font size, font color, image width, image height and many other things to let you convert your text to image. These services are 100% free and geneuine. No Registration Required.">

@endsection

@section('content')
  <div class="ui stackable grid">

    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Create Image With Text
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'texttoimage', 'class' => 'ui form']) !!}

          <div class="ui field">
            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                {!! Form::label('text', 'Text For Image') !!}
                {!! Form::textarea('text', "Click The Button Below To Preview How It Works\nYou May Need To Play With The Settings Below\n\n                                                   www.passportsize-photo.com\n                                                   Quick | Simple | Easy", ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('text') }}</small>
            </div>
          </div>
          <div class="ui four fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('fontstyle') ? ' has-error' : '' }}">
                  {!! Form::label('fontstyle', 'Font Style') !!}
                  {!! Form::select('fontstyle', ['bar'=>'Bar'], 'fontstyle', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('fontstyle') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('fontsize') ? ' has-error' : '' }}">
                  {!! Form::label('fontsize', 'Font Size') !!}
                  {!! Form::number('fontsize', '35', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('fontsize') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('background') ? ' has-error' : '' }}">
                  {!! Form::label('background', 'Background Color') !!}
                  {!! Form::color('background', '#f0a873', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('background') }}</small>
              </div>
            </div>
              <div class="ui field">
                <div class="form-group{{ $errors->has('fontcolor') ? ' has-error' : '' }}">
                    {!! Form::label('fontcolor', 'Font Color') !!}
                    {!! Form::color('fontcolor', '#2c5fbe', ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('fontcolor') }}</small>
                </div>
              </div>
          </div>
          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('align') ? ' has-error' : '' }}">
                  {!! Form::label('align', 'Align Text') !!}
                  {!! Form::select('align', ['left'=>'Left','center'=>'Center','right'=>'Right'], 'center', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('align') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('valign') ? ' has-error' : '' }}">
                  {!! Form::label('valign', 'Vertical Align') !!}
                  {!! Form::select('valign', ['top'=>'Top','middle'=>'Middle','bottom'=>'Bottom'], 'middle', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('valign') }}</small>
              </div>
            </div>

          </div>
          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('width') ? ' has-error' : '' }}">
                  {!! Form::label('width', 'Image Width (px)') !!}
                  {!! Form::number('width', '950', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('width') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                  {!! Form::label('height', 'Image Height (px)') !!}
                  {!! Form::number('height', '400', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('height') }}</small>
              </div>
            </div>
          </div>
          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('xoffset') ? ' has-error' : '' }}">
                  {!! Form::label('xoffset', 'X Offset') !!}
                  {!! Form::number('xoffset', '50', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('xoffset') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('yoffset') ? ' has-error' : '' }}">
                  {!! Form::label('yoffset', 'Y Offset') !!}
                  {!! Form::number('yoffset', '150', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('yoffset') }}</small>
              </div>
            </div>
          </div>


                {!! Form::submit("Create Image With Text", ['class' => 'ui fluid positive button']) !!}

        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Create beautiful image with text
      </div>
      <div class="ui bulleted list">
        <div class="item">Write some text to show up as image</div>
        <div class="item">Set image width and height</div>
        <div class="item">Setup font style, font size, image background ,font color and other things too</div>
        <div class="item">For first time, you should play around with different settings</div>
        <div class="item">Next time, it won't be hard</div>
        <div class="item">:) Amazing</div>
      </div>

    </div>
  </div>


@endsection
