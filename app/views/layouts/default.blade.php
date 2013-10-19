<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="assets/ico/favicon.png">
	<title>Fast Money Expert 
		@if (isset($page_title))
			| {{ $page_title }}
		@endif
	</title>
	
	@if (isset($meta_descriptions))
		{{ $meta_descriptions }}
	@endif
	
	@if (isset($meta_keywords))
		{{ $meta_keywords }}
	@endif
	
	<!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->

	<!-- Bootstrap core JS -->
	<script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</head>

<body @if (isset($body_class))  class="{{ $body_class }}"  @endif>

	<div class="container box-sh">
	
		<nav class="navbar">
		<div class="container">
			<div class="navbar-header col-md-4">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="logo navbar-brand" href="{{ URL::to('home') }}">
					<img src="{{ asset('img/logo.png') }}" alt="Fast Money Expert" />
				</a>
			</div><!--// end navbar-header -->
	
			<nav class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					@if (isset($global_main_menus) && $global_main_menus)
						@foreach ($global_main_menus as $menu)
							<li class="active"><a href="{{ $menu->url }}" title="{{ $menu->description }}">{{ $menu->name }}</a></li>
						@endforeach
					@endif
				</ul>
			</nav><!--// end navbar-collpase -->
		</div>
	</nav>
	
	
	
	@yield('content')
            
            
            
   <footer>
	<div class="container">
		<nav class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				@if (isset($global_footer_menus) && $global_footer_menus)
						@foreach ($global_footer_menus as $menu)
							<li><a href="{{ $menu->url }}" title="{{ $menu->description }}">{{ $menu->name }}</a></li>
						@endforeach
				@endif
			</ul>
		</nav><!--// end navbar-collpase -->

		<div class="copyright">
			<p>All right reserved 2013 www.fastmoneyexpert.com</p>
		</div>
	</div>
</footer>

</div><!--// end box-sh -->

<!-- Bootstrap custom JS see in /assets/ -->
<script src="{{ asset('js/holder.js') }}"></script>
@if (isset($asset_js))
	{{ $asset_js }}
@endif
</body>

</html>