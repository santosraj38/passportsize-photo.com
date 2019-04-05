@extends('layouts.app')

@section('head')
  <title>Customize Passport|ID Size Photo For Printing With Various Paper Size</title>

  <meta name="keywords" content="custom passport paper size , how to print custom passport size photos with paper size , create custom paper size for passport size photo, customize paper and passport size photo for printing">
  <meta name="description" content="Create your custom paper size and passport or ID size photos ready for printing. If you have paper size other than 4x6 or print many passport size image in one paper then you can customize paper size and photo size to your desire. You can also change image width or border spacing according to your needs. These services are 100% free and geneuine. No registration required.">

  <!--Facebook Sharing and likes -->
  <meta property="og:title"  content="Customize Passport|ID Size Photo For Printing With Various Paper Size">
  <meta property="og:type"  content="website">
  <meta property="og:url"  content="{{route('customprint')}}">
  <meta property="og:image"  content="">
  <meta property="og:description"  content="Create your custom paper size and passport or ID size photos ready for printing. If you have paper size other than 4x6 or print many passport size image in one paper then you can customize paper size and photo size to your desire. You can also change image width or border spacing according to your needs. These services are 100% free and geneuine. No registration required.">

@endsection

@section('content')
  <div class="ui stackable grid">
    <div class="eight wide column">
      <div class="ui segment">
        <div class="ui header">
          Custom Print
        </div>
        <div class="ui divider">

        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'customprint', 'class' => 'ui tiny form','files'=>'true']) !!}
          @if (session()->has('image'))
            <div class="ui field">
              <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {!! Form::label('image', 'Change Image',['class'=>'ui large fluid button']) !!}
                  {!! Form::file('image', ['accept'=>'.jpeg,.png,.jpg','style'=>'visibility:hidden']) !!}
                  <small class="text-danger">{{ $errors->first('image') }}</small>
              </div>
              <div id="viewlogo">
                <img src="{{asset('images/'.session('image'))}}" width="200px" height="200px" alt="passportsize-photo.com">
              </div>
              <div id="message">

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
                <div id="message">

                </div>
              </div>

          @endif

          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('row') ? ' has-error' : '' }}">
                  {!! Form::label('row', 'No Of Row') !!}
                  {!! Form::number('row', '4', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('row') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('column') ? ' has-error' : '' }}">
                  {!! Form::label('column', 'No Of Column') !!}
                  {!! Form::number('column', '3', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('column') }}</small>
              </div>
            </div>
          </div>

            <div class="ui field">
              <div class="form-group{{ $errors->has('borderspacing') ? ' has-error' : '' }}">
                  {!! Form::label('borderspacing', 'Border Spacing (px)') !!}
                  {!! Form::number('borderspacing', '6', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('borderspacing') }}</small>
              </div>
            </div>

          <div class="ui two fields">

            <div class="ui field">
              <div class="form-group{{ $errors->has('width') ? ' has-error' : '' }}">
                  {!! Form::label('width', 'Image Width (px)') !!}
                  {!! Form::number('width', '116', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('width') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                  {!! Form::label('height', 'Image Height (px)') !!}
                  {!! Form::number('height', '132', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('height') }}</small>
              </div>
            </div>
          </div>
          <div class="ui two fields">
            <div class="ui field">
              <div class="form-group{{ $errors->has('pagewidth') ? ' has-error' : '' }}">
                  {!! Form::label('pagewidth', 'Page Width (px)') !!}
                  {!! Form::number('pagewidth', '384', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('pagewidth') }}</small>
              </div>
            </div>
            <div class="ui field">
              <div class="form-group{{ $errors->has('pageheight') ? ' has-error' : '' }}">
                  {!! Form::label('pageheight', 'Page Height (px)') !!}
                  {!! Form::number('pageheight', '576', ['class' => 'form-control', 'required' => 'required']) !!}
                  <small class="text-danger">{{ $errors->first('pageheight') }}</small>
              </div>
            </div>
          </div>
          {!! Form::submit("Submit", ['class' => 'ui fluid positive button']) !!}

        {!! Form::close() !!}
      </div>

    </div>
    <div class="eight wide column">
      @include('facebook._likeshare')
      @include('layouts._pixelconvert')
      <div class="ui divider"></div>
      <div class="ui form">
        <div class="ui field">
          <div class="form-group{{ $errors->has('customsize') ? ' has-error' : '' }}">
              {!! Form::label('customsize', 'Standard Sizes') !!}
              {!! Form::select('customsize', ['12copywithborder'=>'4X6 Paper 12 Copy With 6px Clearence','12copywithoutborder'=>'4X6 Paper 12 Copy Without 6px Clearence'], '12copy', ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('customsize') }}</small>
          </div>
        </div>
      </div>
      <div class="ui divider"></div>
      <div class="ui red header">
        Its time for customizing
      </div>
      <div class="ui bulleted list">
        <div class="item">Choose image for printing</div>
        <div class="item">Set no of row, no of column, image width, image height, border spacing, page width and page height</div>
        <div class="item">You will be hinted for possible row and column</div>
        <div class="item">Well Done</div>
      </div>


    </div>

  </div>

@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      checkprint();
    });
    $('[name="row"],[name="column"],[name="borderspacing"],[name="width"],[name="height"],[name="pagewidth"],[name="pageheight"]').change(function(){
      checkprint();
    });
  </script>
  <script type="text/javascript">
    function checkprint(){
      var row = $('[name="row"]').val();
      var column = $('[name="column"]').val();
      var borderspacing = $('[name="borderspacing"]').val();
      var width = $('[name="width"]').val();
      var height = $('[name="height"]').val();
      var pagewidth = $('[name="pagewidth"]').val();
      var pageheight = $('[name="pageheight"]').val();

      var checkwidth = pagewidth - width * column - 2*column*borderspacing;
      var checkheight = pageheight - height * row - 2*borderspacing*row;

      $('#message').html('');
      if (checkwidth<0) {
        $('#message').append('<p style="color:red">- Page Width Is Not Sufficient With Image Width '+width+' Border Spacing '+borderspacing+'( Increase Page Width Or Decrease Image Width)</p>');
      }else if (checkwidth > (Number(borderspacing)*2+Number(width))) {
        $('#message').append('<p style="color:green">- One More Image With Width '+width+', Border Spacing '+borderspacing+' Can Be Added( Increase Column)</p>')
      }

      if (checkheight<0) {
        $('#message').append('<p style="color:red">- Page Height Is Not Sufficient With Image Height '+height+' Border Spacing '+borderspacing+'( Increase Page Height Or Decrease Image Height)</p>');
      }else if (checkheight > (Number(borderspacing)+Number(height))) {
        $('#message').append('<p style="color:green">- One More Image With Height '+width+', Border Spacing '+borderspacing+' Can Be Added( Increase Row)</p>')
      }
    }
  </script>
@endsection
