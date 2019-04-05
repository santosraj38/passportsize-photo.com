@extends('layouts.app')

@section('head')
  <title>Add Watermark|Logo To Image Online 100% Free</title>

  <meta name="keywords" content="add watermark to image, add logo to image, convert image to watermark online free,free watermark,create watermark,watermark logo,how to put a watermark on a photo without photoshop, watermark photos app, create your own watermark online free">
  <meta name="description" content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. This serices are 100% free and geneuine. No sign up required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Add Watermark|Logo To Image Online For Free">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('watermark')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. This serices are 100% free and geneuine. No sign up required.">

@endsection

@section('content')
  <div class="ui stackable grid">

    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Add Watermark To Image
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'watermark', 'class' => 'ui form','files'=>'true']) !!}

          <div class="ui field">
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                {!! Form::label('image', 'Browse Image',['class'=>'ui fluid button']) !!}
                {!! Form::file('image', ['required' => 'required','style'=>'visibility:hidden']) !!}
                <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
            <div id="viewlogo">

            </div>
          </div>
          <div class="ui field">
            <div class="form-group{{ $errors->has('watermark') ? ' has-error' : '' }}">
                {!! Form::label('watermark', 'Browse Watermark Image',['class'=>'ui fluid button']) !!}
                {!! Form::file('watermark', ['required' => 'required','style'=>'visibility:hidden']) !!}
                <small class="text-danger">{{ $errors->first('watermark') }}</small>
            </div>
            <div id="viewwatermark">

            </div>
          </div>
          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('opacity') ? ' has-error' : '' }}">
                  {!! Form::label('opacity', 'Opacity %') !!}
                  {!! Form::number('opacity', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'0 to 100']) !!}
                  <small class="text-danger">{{ $errors->first('opacity') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('watermarkposition') ? ' has-error' : '' }}">
                  {!! Form::label('watermarkposition', 'Watermark Position') !!}
                  {!! Form::select('watermarkposition', ['top-left'=>'Top Left','top'=>'Top','top-right'=>'Top Right','left'=>'Left','center'=>'Center','right'=>'Right','buttom-left'=>'Buttom Left','buttom'=>'Buttom','buttom-right'=>'Buttom Right'], 'top-left', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('watermarkposition') }}</small>
              </div>
            </div>
          </div>
          <div class="ui two fields">

            <div class="ui field">
              <div class="form-group{{ $errors->has('watermarkwidth') ? ' has-error' : '' }}">
                  {!! Form::label('watermarkwidth', 'Watermark Width (px)') !!}
                  {!! Form::number('watermarkwidth', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('watermarkwidth') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('watermarkheight') ? ' has-error' : '' }}">
                  {!! Form::label('watermarkheight', 'Watermark Height (px)') !!}
                  {!! Form::number('watermarkheight', null, ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('watermarkheight') }}</small>
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
        Add Watermark To Image
      </div>
      <div class="ui bulleted list">
        <div class="item">Choose the first image that you want to have watermark</div>
        <div class="item">Choose second image that is to be added as watermark</div>
        <div class="item">Set watermark opacity, width, height and position</div>
        <div class="item">That's it, its takes only upload time</div>
      </div>
    </div>
  </div>

@endsection
