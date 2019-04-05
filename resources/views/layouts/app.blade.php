<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('public/favicon.ico')}}" type="image/x-icon">
        @yield('head')

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css" />
        <!-- Styles -->
         @include('google._analytics')
    </head>
    <body>
      @include('facebook._afterbody')
      <div class="ui fluid container">
        @include('layouts._nav')
        <!-- Include Google Ad1 HERE -->
        <div class="ui grid stackable">
            <div class="three wide column large screen only">
              @include('layouts._sidebar')
            </div>
            <div class="thirteen wide column">
              <div id="ajax">
              </div>
              @yield('content')

            </div>
        </div>
      </div>
      @include('layouts._footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
@yield('scripts')
<script src="{{asset('js/javascript.js')}}" charset="utf-8"></script>

    </body>
</html>
