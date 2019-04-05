
  <div class="ui accordion segment">

    <div class="ui title header">
    Convert  mm, cm or inch to pixel <i class="dropdown icon"></i>
    </div>
    <div class="ui content form tiny">
      <div class="ui two fields">
        <div class="ui field">
          <div class="form-group{{ $errors->has('unitvalue') ? ' has-error' : '' }}">
              {!! Form::number('unitvalue', null, ['class' => 'form-control', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('unitvalue') }}</small>
          </div>
        </div>
        <div class="ui field">
          <div class="form-group{{ $errors->has('unit') ? ' has-error' : '' }}">
              {!! Form::select('unit', ['mm'=>'mm','cm'=>'cm','inch'=>'inch'], null, ['class' => 'ui fluid dropdown', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('unit') }}</small>
          </div>
        </div>

      </div>
      <div class="ui horizontal divider">
        Convert To
      </div>
      <div class="ui two fields">
        <div class="ui field">
          <div class="form-group{{ $errors->has('pixelvalue') ? ' has-error' : '' }}">
              {!! Form::text('pixelvalue', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'value in pixel']) !!}
              <small class="text-danger">{{ $errors->first('pixelvalue') }}</small>
          </div>
        </div>
        <div class="ui field">
          <div class="form-group{{ $errors->has('pixel') ? ' has-error' : '' }}">
              {!! Form::select('pixel', ['pixel'=>'pixel'], 'pixel', ['class' => 'ui disabled fluid dropdown', 'required' => 'required']) !!}
              <small class="text-danger">{{ $errors->first('pixel') }}</small>
          </div>
        </div>
      </div>

    </div>
  </div>
