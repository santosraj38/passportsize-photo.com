
<div class="ui inverted fluid attached segment" style="margin-top:25px;min-height:30vh">
  <div class="ui container">
    <div class="ui stackable grid">
      <div class="five wide column">
        <a href="{{route('welcome')}}">
        <div class="ui inverted large red header">
          Passportsize-photo.com
          <div class="ui sub header">
            Simple | Quick | Easy
          </div>
        </div></a>


      </div>
      <div class="five wide column">
        <div class="ui list">
          <a hreflang="en" href="{{route('background')}}" class="item">Remove Background</a>
          <a hreflang="en" href="{{route('cropimageuploadpage')}}" class="item">Crop</a>
          <a hreflang="en" class="item" href="{{route('resize')}}">Resize</a>
          <a hreflang="en" class="item" href="{{route('watermark')}}">Add Watermark|Logo</a>
          <a hreflang="en" class="item" href="{{route('passportsize')}}">Passport Size Photo</a>
          <a hreflang="en" class="item" href="{{route('passportprint')}}">Passport Size Photo For Print</a>
          <a hreflang="en" class="item" href="{{route('autosize')}}">Auto|ID Size Photo</a>
          <a hreflang="en" class="item" href="{{route('autoprint')}}">Auto|ID Size Photo Photo For Print</a>
          <a hreflang="en" href="{{route('texttoimage')}}" class="item">Text To Image</a>
          <a hreflang="en" href="{{route('addtexttoimage')}}" class="item">Add Text To Existing Image</a>
          <a hreflang="en" href="{{route('customprint')}}" class="item">Customize Print</a>
        </div>
      </div>
      <div class="five wide column">
        @include('facebook._display')
      </div>
    </div>
  </div>
</div>
<div class="ui attached inverted center aligned segment">
  <span><a >Contact Us</a> | </span>
  <span><a hreflang="en" href="{{route('privacypolicy')}}">Privacy Policy</a> | </span>
  <span><a hreflang="en" href="{{route('termsandconditions')}}">Terms and Conditions</a> | </span>
  <span>Copyright <i class="copyright icon"></i> 2018</span>
</div>
