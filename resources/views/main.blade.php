<!doctype html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  <body>
    
  @include('partials._nav')
      

        <div class="container my-4">
        @include('partials._messages')

       
        @yield('content')            
        
        </div>

    @include('partials._footer')
    @include('partials._scripts')
  </body>
  </html>