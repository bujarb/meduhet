@extends('layouts.main')

@section('content')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/sq_AL/sdk.js#xfbml=1&version=v2.10&appId=106329286773741";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-md-3">
                <a href="{{route('facebook.login')}}" class="btn btn-primary">Login with Facebook</a>
            </div>
        </div>
    </div>
  <div class="row" style="margin-top:20px">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" style="margin-bottom:20px">
          <form role="form" action="{{route('login')}}" method="post">
            {{ csrf_field() }}
            <fieldset>
              <h2>Ju lutem kyquni</h2>
              <hr class="colorgraph">
              <div class="form-group">
                          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Adresa">
              </div>
              <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Fjalekalimi">
              </div>
              <span class="button-checkbox">
                <button type="button" class="btn" data-color="info">Me mbaj mend</button>
                          <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                <a href="" class="btn btn-link pull-right">Harruat fjalekalimin?</a>
              </span>
              <hr class="colorgraph">
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                              <input type="submit" class="btn btn-lg btn-success btn-block" value="Kyqu">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                  <a href="{{route('register')}}" class="btn btn-lg btn-primary btn-block">Regjistrohu</a>
                </div>
              </div>
            </fieldset>
          </form>
      </div>
  </div>
@endsection
