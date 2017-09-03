<!DOCTYPE html>
<html lang="en">
  @include('partials.head')
  <body>
    @include('partials.adminnav')

    <div class="container mycontainer">
      @include('partials.message')
      @yield('content')
    </div>
      @yield('scripts')
    @include('partials.javascript')
  </body>
</html>
