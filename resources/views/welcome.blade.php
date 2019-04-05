<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Passport Size Photo Instantly QUICK | SIMPLE | EASY</title>
    <meta name="keywords" content="make passport photo, blue background passport photo online, how to print passport photos on 4x6 paper,passport photo size,how to print passport size photo,how to make passport size photo,passport size photo maker software free download">
    <meta name="description" content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. These services are 100% free and geneuine. No sign up required.">

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

    <!--Facebook Sharing and likes -->
    <meta property="og:title"  content="Create Passport Size Photo Instantly 100% Free And Geneuine">
    <meta property="og:type"  content="website">
    <meta property="og:url"  content="{{route('welcome')}}">
    <meta property="og:image"  content="">
    <meta property="og:description"  content="Create passport, auto and ID size photo in just seconds. Default paper size is 4 x 6 inch. You can still customize image size and paper size for printing. This serices are 100% free and geneuine. No sign up required.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css" />
    @include('google._analytics')
    <meta name="google-site-verification" content="cn719FuKiUYYkO3bJ8zac9jkczJDjEMvank56ye_2NE" />
  </head>
  <body>

    <div class="ui attached inverted segment">
      <div class="ui fluid inverted menu" style="border-radius:0px">
        <a class="item" href="{{route('welcome')}}">
          <div class="ui inverted large red header">
            Passportsize-photo.com
            <div class="ui sub header">
              Simple | Quick | Easy
            </div>
          </div>
        </a>
        <div class="right menu">
        @include('facebook._likeshare')
      </div>
      </div>
    </div>

    <div class="ui attached segment">
        <div class="ui fluid container">
          <div class="ui stackable grid">
            <div class="sixteen wide column">
              <div class="ui fluid image">
                <img src="{{asset('files/passportsize-photo.png')}}" alt="machhapuchhre and tal barahi" height="50%">
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Resize Image-->
      <div class="ui attached inverted segment" >
        <a class="ui large header centered" href="{{route('cropimageuploadpage')}}"><h1 >Crop Image</h1></a>
        <br>
        <div class="ui container">
          <div class="ui stackable grid">
            <div class="eight wide column">
              <div class="ui segment">
                <div class="ui header">
                  Upload Image and select area for cropping
                </div>
                <div class="content">
                  <div class="ui image">
                    <img src="{{asset('files/cropping.PNG')}}" alt="machhapuchhre and tal barahi">
                  </div>
                </div>
              </div>
            </div>
            <div class="eight wide column">
              <div class="ui segment">

                <div class="content">
                  <div class="ui image">
                    <img src="{{asset('files/cropped.jpg')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>

            <br>
            <a class="ui huge blue button" href="{{route('cropimageuploadpage')}}"><i class="crop icon"></i>Crop Image</a>

          </div>
        </div>
      </div>
      <div class="ui attached inverted red segment" >
        <a class="ui large header centered" href="{{route('resize')}}"><h1 >Resize Image</h1></a>
        <br>
        <div class="ui container">
          <div class="ui stackable grid">

            <div class="five wide column">
              <div class="ui segment">
                <div class="ui header">Resize Image</div>
                <div class="content" style="font-size:18px">
                    Resize images to your desired dimensions.
                </div>

                <br><br>
                <a class="ui huge blue button" href="{{route('resize')}}"><i class="expand icon"></i>Resize Image</a>
              </div>

            </div>

            <div class="eleven wide column">
              <div class="ui segment">

                <div class="content" style="font-size:18px">

                    <div class="ui image">
                      <img src="{{asset('files/machhapuchhre.jpg')}}" alt="passportsize-photo.com">
                    </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
      <div class="ui attached segment" >
        <a class="ui large header centered" href="{{route('passportsize')}}"><h1 >Single Passport Size Photo</h1></a>
        <br>
        <div class="ui container">
          <div class="ui stackable grid">
            <div class="eight wide column">
              <div class="ui segment">
                <div class="ui header">
                  Passport Size Photo 2x2 inch
                </div>
                <div class="content" style="font-size:18px">
                  If you need only single passport size photo, you can simply upload the photo and you can get single passport size photo with dimension 2X2 inch.
                  <br><br>
                  For other dimension you can resize them <a href="{{route('resize')}}">Here</a>
                  <br><br>
                  <a class="ui huge blue button" href="{{route('passportsize')}}"><i class="image icon"></i>Convert To Passport Size Photo</a>
                </div>
              </div>
            </div>
            <div class="eight wide column">
              <div class="ui segment">
                <div class="ui header">
                  Default Passport Size Photo 2X2 inch
                </div>
                <div class="content">

                  <div class="ui small image">
                    <img src="{{asset('files/user.jpg')}}" alt="passportsize-photo.com">
                  </div>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="ui attached inverted segment" >
        <a class="ui large header centered" href="{{route('passportprint')}}"><h1 >Passport Size Photo For Print</h1></a>
        <br>
        <div class="ui container">
          <div class="ui stackable grid">
            <div class="eight wide column">
              <div class="ui segment">
                <div class="ui header">
                  Passport Size Photo For Print 4x6 inch paper
                </div>
                <div class="content" style="font-size:18px">
                  Create ready to print passport size photo in just seconds. Default passport photo size is 2X2 inch including 6px as border spacing or clearence and paper 4X6 inch.
                  <br><br>
                  For customizing photo and paper click <a href="{{route('customprint')}}">Here</a>
                  <br><br>
                    <a class="ui huge blue button" href="{{route('passportprint')}}"><i class="large th icon"></i>Printable Passport Size Photo</a>
                </div>
              </div>
            </div>
            <div class="eight wide column">
              <div class="ui segment">
                <div class="ui header">
                  Printable Passport Size Photo
                </div>
                <div class="content">
                  <div class="ui fluid medium centered image">
                    <img src="{{asset('files/user-passportprint.png')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="ui attached inverted red segment" >
        <a class="ui large header centered" href="{{route('autosize')}}"><h1 >Single Auto|ID Size Photo</h1></a>
        <br>
        <div class="ui container">
          <div class="ui two column stackable grid">
            <div class="column">
              <div class="ui segment">
                <div class="ui header">
                  Auto|ID Size Photo 35x45 mm | 132x170px
                </div>
                <div class="content" style="font-size:18px">
                  If you need only single auto|id size photo, you can simply upload the photo and you can get single auto|id size photo with dimension 35mm X 45mm | 132x170 px .
                  <br><br>
                  For other dimension you can resize them <a href="{{route('resize')}}">Here</a>
                  <br><br>
                    <a class="ui huge blue button" href="{{route('autosize')}}"><i class="image icon"></i>Auto|ID Size Photo</a>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui segment">
                <div class="ui header">
                  Default Auto|ID Size Photo 35mm X 45mm | 132px X 170px
                </div>
                <div class="content">
                  <div class="ui small image">
                    <img src="{{asset('files/user.jpg')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="ui attached segment" >
        <a class="ui large header centered" href="{{route('autoprint')}}"><h1 >Auto|ID Size Photo For Print</h1></a>
        <br>
        <div class="ui container">
          <div class="ui two column stackable grid">
            <div class="column">
              <div class="ui segment">
                <div class="ui header">
                  Auto|ID Size Photo For Print 4x6 inch paper
                </div>
                <div class="content" style="font-size:18px">
                  It takes only photo upload time to create <br> printable auto|id size photo with width 116px and height 132px for 4x6 inch paper.<br><br>
                  If you need to print on a different paper size or need different image size you can customize it <a href="{{route('customprint')}}">here</a>. <br><br>
                  <a class="ui huge blue button" href="{{route('autoprint')}}"><i class="th icon"></i>Auto|ID Size Photo For Print</a>

                </div>
              </div>
            </div>

            <div class="column">
              <div class="ui segment">
                <div class="ui header">
                  Auto|ID Size Photo For Print
                </div>
                <div class="content">
                  <div class="ui medium fluid centered image">
                    <img src="{{asset('files/user-autoprint.png')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="ui attached inverted segment" >
        <a class="ui large header centered" href="{{route('texttoimage')}}"><h1 >Text To Image</h1></a>
        <br>
        <div class="ui container">
          <div class="ui two column stackable grid">
            <div class="column">
              <div class="ui segment">
                <div class="ui header">
                  Convert Text To Image
                </div>
                <div class="content" style="font-size:18px">
                    Images speak louder than text. Beautiful quotes looks better in image rather than just simple text. <br><br>
                    The image on the right side was created with this app.<br><br> It takes only one or two seconds to create images with your beautiful thoughts and quotes.
                    <br><br><a class="ui huge blue button" href="{{route('texttoimage')}}"><i class="text width icon"></i>Text To Image</a>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui segment">
                <div class="content">
                  <div class="ui image fluid">
                    <img src="{{asset('files/texttoimage.png')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="ui attached inverted red segment">
        <a class="ui large header centered" href="{{route('addtexttoimage')}}"><h1 >Add Text To Existing Image</h1></a>
        <br>
        <div class="ui container">
          <div class="ui stackable grid">
            <div class="five wide column">
              <div class="ui segment">
                <div class="ui header">
                  Add Text To Image
                </div>
                <div class="content" style="font-size:18px">
                    If you want to add caption or quotes to beautiful images.<br><br>
                    This is the right place for such action.<br><br>
                    <a class="ui huge blue button" href="{{route('addtexttoimage')}}"><i class="image outline icon"></i>Add Text To Existing Image</a>
                </div>
              </div>
            </div>
            <div class="eleven wide column">
              <div class="ui segment">

                <div class="content" >
                  <div class="ui image">
                    <img src="{{asset('files/landofhimalayas.jpg')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="ui attached segment" >
        <a class="ui large header centered" href="{{route('customprint')}}"><h1 >Customize Photo and Paper For Printing</h1></a>
        <br>
        <div class="ui container">
          <div class="ui two column stackable grid">
            <div class="column">
              <div class="ui segment">
                <div class="ui header">
                  Customize Photo And Paper
                </div>
                <div class="content" style="font-size:18px">
                    If you need to print your passport size photo with image width and height other than 180px and 180px respectively and paper size other than 4X6 inch ,<br> then you can simply upload your image with desired image width and height and paper width and height.<br><br>
                    Specify border spacing or clearence and you are ready for printable image.<br><br>Don't hesitate to explore.
                    <br><br>
                    <a class="ui huge blue button" href="{{route('customprint')}}"><i class="th icon"></i>Customize Photo Print</a>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="ui segment">

                <div class="content">
                  <div class="ui image fluid">
                    <img src="{{asset('files/user-customprint.png')}}" alt="passportsize-photo.com">
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    @include('facebook._afterbody')
    @include('layouts._footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
  </body>
</html>
