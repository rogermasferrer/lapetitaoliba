@extends('layouts.blank')

@section('container')
	@section('navbar')
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="/blog">La petita &ograve;liba</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
					@auth
				        <li>{{ HTML::link(route('admin'), 'Admin') }}</li>
					@endauth
			        <li class="active"><a href="/blog">Blog<span class="sr-only">(current)</span></a></li>
<!--			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>
-->
	            </ul>
<!--			      <form class="navbar-form navbar-left">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			      </form>
-->
                  <!-- Right Side Of Navbar -->
                  <ul class="nav navbar-nav navbar-right">
	                  <!-- Authentication Links -->
                      @guest
                          <li><a href="{{ route('login') }}">Login</a></li>
                          <li><a href="{{ route('register') }}">Register</a></li>
                      @else
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <ul class="dropdown-menu">
                                  <li>
                                     <a href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
                              </ul>
                          </li>
                      @endguest
                  </ul>


			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		@show
	
	@section('header')
		<div class="container">
			<img class="img-responsive" src="/images/header.jpeg" />
		</div>
		@show
	
	<div class="container">
		@section('content')
	        <div class="row">
	            <div class="col-sm-4">
	                <p>Some content</p>
	            </div>
	            <div class="col-sm-4">
	                <p>Column 2</p>
	            </div>
	            <div class="col-sm-4">
	                <p>Final column</p>
	            </div>
			</div>
		@show
	</div>
	
	@section('footer')
		<div class="container-fluid">
			<div class="text-center bg-info">
				<p>&copy;Some copyright</p>
			</div>
		</div>
		@show
@endsection

