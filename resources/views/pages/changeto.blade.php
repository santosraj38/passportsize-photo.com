@extends('layouts.app')

@section('head')

  <title>Change Image Format|Extension To Other Formats Instantly 100% Free</title>

  <meta name="keywords" content="convert picture to jpg, convert image to jpeg, free image converter, convert image to png, convert image to gif, jpg converter free download,convert png to jpg">
  <meta name="description" content="Convert your images instantly to other formats. The easiest and quickest online image converter.These serveces are 100% free and geneuine.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Convert Picture To Other Formats Instantly 100% Free And Geneuine">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('changeto')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Convert your images instantly to other formats. The easiest and quickest online image converter.These serveces are 100% free and geneuine.">

@endsection

@section('content')
  <div class="ui stackable grid">
    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Change Image To Other Format
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'changeto', 'class' => 'ui tiny form','files'=>'true']) !!}
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
            <div class="form-group{{ $errors->has('changeto') ? ' has-error' : '' }}">
                {!! Form::label('changeto', 'Change To') !!}
                {!! Form::select('changeto', ['jpg'=>'jpg','png'=>'png','gif'=>'gif','jpeg'=>'jpeg'], 'jpg', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('changeto') }}</small>
            </div>
          </div>


                {!! Form::submit("Change Image Format", ['class' => 'ui fluid positive button','id'=>'submitresize']) !!}
        {!! Form::close() !!}
      </div>
    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui red header">
        Change Image Format
      </div>
      <div class="ui bulleted list">
        <div class="item">Select Image</div>
        <div class="item">Change the format you want to change to</div>
        <div class="item">Congratulations, Its done</div>
      </div>
      <div class="ui small header">
        Note
      </div>
      <div class="ui bulleted list">
        <div class="item">Only .jpg, .jpeg, .gif, .png are supported this day</div>
      </div>
    </div>
  </div>

@endsection
