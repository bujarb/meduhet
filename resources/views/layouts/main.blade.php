<!DOCTYPE html>
<html lang="en">
  @include('partials.head')
  <body>
    @include('partials.nav')

    <div class="container mycontainer">
      @include('flash::message')
      @include('partials.message')
      @yield('content')

    </div>
    @include('partials.javascript')
    @include('partials.footer')
  </body>
</html>
