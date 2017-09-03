<div class="well well1">
    <div class="row">
      <div class="col-md-12 icon">
          <a href="#"><img src="{{asset('images/icons/facebook.png')}}"/></a>
          <a href="#"><img src="{{asset('images/icons/instagram.png')}}"/></a>
          <a href="#"><img src="{{asset('images/icons/twitter.png')}}"/></a>
          <a href="#"><img src="{{asset('images/icons/map.png')}}"/></a>
          <a href="#" class="pull-right" data-toggle="modal" data-target="#myModal"><img src="{{asset('images/icons/icon.png')}}"/></a>
      </div>
    </div>
</div>
<nav class="navbar navbar-default mynav">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a type="a" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="navbar-brand" href="{{route('home')}}">Me Duhet</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="{{route('about')}}">Rreth Nesh <span class="sr-only">(current)</span></a></li>
          <li><a href="{{route('contact')}}">Na kontaktoni</a></li>
        </ul>
        @php
          $count = 0;
        @endphp
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{route('search')}}">Kerkim i Avancuar <i class="fa fa-search" aria-hidden="true"></i>
</a></li>
          @if (Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="a" aria-haspopup="true" aria-expanded="false"> Njoftimet <span class="badge"><i class="fa fa-commenting" aria-hidden="true"></i></span></a>
              <ul class="dropdown-menu">
                @foreach (Auth::user()->notifications as $notification)
                  <li>
                    <a href="#">{{$notification->data['message']}}</a>
                  </li>
                @endforeach
                <li role="separator" class="divider"></li>
                <li><a href="#">Fshij te gjitha</a></li>
              </ul>
            </li>
          @endif
          @if(Route::currentRouteName()!='add.need')
            <li><a href="{{route('add.need')}}" class="border-a">Krijo nje nevoje <i class="fa fa-plus" aria-hidden="true"></i></a></li>
          @endif
          @if(Auth::check())
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="a" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="{{route('user-profile')}}">Profile Im</a></li>
                  @role('super_admin')
                    <li><a href="{{route('admin-control-center')}}">Qendra e Kontrollit</a></li>
                  @endrole
                  @role('admin')
                    <li><a href="{{route('admin-control-center')}}">Qendra e Kontrollit</a></li>
                  @endrole
                <li role="separator" class="divider"></li>
                <li><a href="{{route('messages')}}">Mesazhet</a></li>
                <li><a href="{{route('my-products',Auth::user()->id)}}">Produktet</a></li>
                <li><a href="{{route('my-needs',Auth::user()->id)}}">Nevojat</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('logout')}}">Qkyqu</a></li>
              </ul>
            </li>
          @else
            <li><a href="{{route('login')}}" class="border-a">Kyqu</i></a></li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Me Duhet</h4>
        </div>
        <div class="modal-body">
          <h3>Miresevini ne MeDuhet</h3>
          <hr  />
          <p>
            MeDuhet eshte nje web aplikacion i cili u sherben njerzve dhe biznese qe me lehte te gjejne qka ju duhet.
            Mjafton te shtypni butonin "Krijo nje nevoje" dhe te mbushni te dhenat tuaja dhe pastaj nevoja juaj do te shfaqet ne web faqe.Nese dikush prej perdoruesve te aplikacionit posedon mjetin apo nevojne qe ti ke kerkuar ata do te informohen dhe do te ju kontaktojn.Pra tani qdo gje do te jete me e lehte.
            Ju falemiderit.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
