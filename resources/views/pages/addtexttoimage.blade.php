@extends('layouts.app')

@section('head')
  <title>Add Text To Existing Image</title>
  <meta name="keywords" content="add text to image online free, add text to photo free, add text to photo, how to add text to a picture, text to picture generator,online text editor with fonts">
  <meta name="description" content="Add beautiful quotes to your beautiful images.This is quick and easy. You can play with multiple fonts and can create professional pictures for your business. These services are 100% free and geneuine. No sign up required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Add Text To Image Instantly Quick And Easy - 100% Free">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('addtexttoimage')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Add beautiful quotes to your beautiful images.This is quick and easy. You can play with multiple fonts and can create professional pictures for your business. These services are 100% free and geneuine. No sign up required.">

@endsection

@section('content')
  <div class="ui stackable grid">

    <div class="eight wide column">
      <div class="ui fluid segment">
        <div class="ui header">
          Add Text To Your Image
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'addtexttoimage', 'class' => 'ui tiny fluid form','files'=>'true']) !!}
        <div class="ui field">
          <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
              {!! Form::label('image', 'Browse Image',['class'=>'ui large fluid button']) !!}
              {!! Form::file('image', ['required' => 'required','accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
              <small class="text-danger">{{ $errors->first('image') }}</small>
          </div>
          <div id="viewlogo">

          </div>
        </div>
          <div class="ui field">
            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                {!! Form::label('text', 'Add Text To Image') !!}
                {!! Form::textarea('text', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('text') }}</small>
            </div>
          </div>
          <div class="ui three fields">
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
                  {!! Form::number('fontsize', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('fontsize') }}</small>
              </div>
            </div>

              <div class="ui field">
                <div class="form-group{{ $errors->has('fontcolor') ? ' has-error' : '' }}">
                    {!! Form::label('fontcolor', 'Font Color') !!}
                    {!! Form::color('fontcolor', null, ['class' => 'ui fluid', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('fontcolor') }}</small>
                </div>
              </div>
          </div>
          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('align') ? ' has-error' : '' }}">
                  {!! Form::label('align', 'Align Text') !!}
                  {!! Form::select('align', ['left'=>'Left','center'=>'Center','right'=>'Right'], 'left', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('align') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('valign') ? ' has-error' : '' }}">
                  {!! Form::label('valign', 'Vertical Align') !!}
                  {!! Form::select('valign', ['top'=>'Top','middle'=>'Middle','bottom'=>'Bottom'], 'top', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('valign') }}</small>
              </div>
            </div>

          </div>

          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('xoffset') ? ' has-error' : '' }}">
                  {!! Form::label('xoffset', 'X Offset') !!}
                  {!! Form::number('xoffset', '25', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('xoffset') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('yoffset') ? ' has-error' : '' }}">
                  {!! Form::label('yoffset', 'Y Offset') !!}
                  {!! Form::number('yoffset', '25', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('yoffset') }}</small>
              </div>
            </div>
          </div>

                {!! Form::submit("Add Text To Image", ['class' => 'ui fluid positive button']) !!}

        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Add text to existing image
      </div>
      <div class="ui bulleted list">
        <div class="item">Choose image first</div>
        <div class="item">Add text to be added into image</div>
        <div class="item">Setup font style, font size, font color, x offset and y offset</div>
        <div class="item">Next time, it won't be hard</div>
        <div class="item">:) Great Job</div>
      </div>
    </div>
  </div>


@endsection
