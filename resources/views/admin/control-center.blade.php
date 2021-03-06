@extends('layouts.adminmain')

@section('content')
  <div class="row">
    <h1 class="text-center">Dashboard <i class="fa fa-tachometer" aria-hidden="true"></i>
</h1>
  </div>
  	<div class="col-md-3">

  	    <div class="panel panel-info">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-list-ol fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">{{DB::table('needs')->count()}}</p>
                  <p class="announcement-text">Needs</p>
                </div>
              </div>
            </div>
            <a href="#">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    View All
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>

  	</div>




  	<div class="col-md-3">

  	    <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-usd fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">{{DB::table('products')->count()}}</p>
                  <p class="announcement-text">Products</p>
                </div>
              </div>
            </div>
            <a href="#">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    Details
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>

  	</div>



  	<div class="col-md-3">

  	    <div class="panel panel-warning">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-line-chart fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading">{{DB::table('users')->count()}}</p>
                  <p class="announcement-text">Users</p>
                </div>
              </div>
            </div>
            <a href="#">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    Details
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>

  	</div>




  	<div class="col-md-3">

  	    <div class="panel panel-success">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                  <i class="fa fa-money fa-5x"></i>
                </div>
                <div class="col-xs-6 text-right">
                  <p class="announcement-heading"> $ 250 k</p>
                  <p class="announcement-text">Recovered <i class=""></i>  </p>
                </div>
              </div>
            </div>
            <a href="#">
              <div class="panel-footer announcement-bottom">
                <div class="row">
                  <div class="col-xs-6">
                    Details
                  </div>
                  <div class="col-xs-6 text-right">
                    <i class="fa fa-arrow-circle-right"></i>
                  </div>
                </div>
              </div>
            </a>
          </div>

  	</div>




  	<div class="col-md-6">

  	    <h3>Main customers</h3>

  	    <table class="table table-condensed table-bordered table-hover small">
  	        <thead>
  	           <tr>
  	               <th style="width:80px;">.</th>
  	               <th>Name</th>
  	               <th>Revenue</th>
  	               <th>Tax</th>
  	               <th>Cap</th>
  	               <th>ROI</th>
  	               <th>Interest</th>
  	           </tr>
  	        </thead>
  	        <tbody>

  	            <tr>
  	                <td>
  	                    <a href="#"> <i class="glyphicon glyphicon-dashboard"></i></a>
  	                    <a href="#"> <i class="glyphicon glyphicon-eye-open"></i></a>
  	                    <a href="#"> <i class="glyphicon glyphicon-warning-sign"></i></a>
  	                </td>
  	                <td>
  	                    Company 1
  	                </td>
  	                <td>
  	                    $ 350 k
  	                </td>
  	                <td>
  	                    4
  	                </td>
  	                <td>
  	                    $ 291,75
  	                </td>
  	                <td>3,72</td>
  	                <td>
  	                    3,65%
  	                </td>

  	            </tr>

  	            <tr class="danger">
  	                <td>
  	                    <a href="#"> <i class="glyphicon glyphicon-dashboard"></i> </a>
  	                    <a href="#"> <i class="glyphicon glyphicon-eye-open"></i> </a>
  	                    <a href="#"> <i class="glyphicon glyphicon-warning-sign"></i></a>
  	                </td>

  	                <td>
  	                    Customer 2
  	                </td>
  	                <td>$ 270 k</td>
  	                <td>7,8 </td>
  	                <td>$ 1307.32</td>
  	                <td>2,61</td>
  	                <td>8,45%</td>
  	            </tr>

  	            <tr class="info">
  	                <td>
  	                    <a href="#"> <i class="glyphicon glyphicon-dashboard"></i> </a>
  	                    <a href="#"> <i class="glyphicon glyphicon-eye-open"></i> </a>
  	                    <a href="#"> <i class="glyphicon glyphicon-warning-sign"></i></a>
  	                </td>

  	                <td>
  	                    Customer 3
  	                </td>
  	                <td>$ 125 k</td>
  	                <td>2,5 </td>
  	                <td>$ 312.45</td>
  	                <td>9,21</td>
  	                <td>2,5%</td>
  	            </tr>

  	            <tr >
  	                <td>
  	                    <a href="#"> <i class="glyphicon glyphicon-dashboard"></i> </a>
  	                    <a href="#"> <i class="glyphicon glyphicon-eye-open"></i> </a>
  	                    <a href="#"> <i class="glyphicon glyphicon-warning-sign"></i></a>
  	                </td>

  	                <td>
  	                    Customer 4
  	                </td>
  	                <td>$ 205 k</td>
  	                <td>7,1 </td>
  	                <td>$ 115,75</td>
  	                <td>6,27</td>
  	                <td>(n/d)</td>
  	            </tr>


  	        </tbody>

  	    </table>

      </div>

  	<div class="col-md-6">
  	    <div id='grafico1' class="grafico"></div>
  	</div>

  	<div class="col-md-6">
  	    <div id='grafico2' class="grafico"></div>
  	</div>
  	<div class="col-md-6">
  	    <div id='grafico3' class="grafico"></div>
  	</div>




  		<div class="col-md-8">

  	    <h3>Messages</h3>

  	    <table class="table table-condensed table-bordered table-hover small">
  	        <thead>
  	           <tr>
  	               <th style="width:30px;">.</th>
  	               <th>From</th>
  	               <th>Subject</th>
  	               <th>Actions</th>
  	           </tr>
  	        </thead>
  	        <tbody>




  	            <tr class="text-info">
  	                <td>
  	                   <i class="glyphicon glyphicon-info-sign"></i>
  	                </td>
  	                <td>
  	                   John Doe
  	                </td>
  	                <td>
  	                    Complaint
  	                </td>
  	                <td>
  	                    <a href="#"> <i class="glyphicon glyphicon-eye-open"></i></a>
  	                    <a href="#"> <i class="glyphicon glyphicon-arrow-right"></i> </a>
  	                </td>

  	            </tr>


  	            <tr class="text-info">
  	                <td>
  	                   <i class="glyphicon glyphicon-user"></i>
  	                </td>
  	                <td>
  	                    Mr Joe
  	                </td>
  	                <td>
  	                    Congrats
  	                </td>
  	                <td>
  	                    <a href="#"> <i class="glyphicon glyphicon-eye-open"></i></a>
  	                    <a href="#"> <i class="glyphicon glyphicon-arrow-right"></i> </a>
  	                </td>

  	            </tr>



  	        </tbody>

  	    </table>

      </div>


  		<div class="col-md-6">
  	    <div id='grafico4' class="grafico" style="height: 400px;"></div>
  	</div>
@endsection
