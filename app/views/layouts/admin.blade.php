<?php 
	$activeMenu = Request::segment(2);
	if (!$activeMenu) {
		$activeMenu = 'dashboard';
	}
	
	define('ACTIVE_MENU', $activeMenu);
	
	function activeMenu($menu)
	{
		return (ACTIVE_MENU == $menu) ? 'class="active"' : '';
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{ View::make('admin/partials/styles') }}
    @if (isset($asset_css))
    	{{ $asset_css }}
    @endif

	<script src="{{ asset('js/jquery.js') }}"></script>
	
	<style type="text/css">
		#main_container {
			padding: 45px 20px 0 20px;
		}
	</style>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="{{ URL::to('admin') }}">PAYDAY - ADMIN</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li <?php echo activeMenu('dashboard'); ?>><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
              <li <?php echo activeMenu('site'); ?>><a href="{{ URL::to('admin/site') }}">Sites</a></li>
              <li <?php echo activeMenu('menu'); ?>><a href="{{ URL::to('admin/menu') }}">Menus</a></li>
              <li <?php echo activeMenu('content'); ?>><a href="{{ URL::to('admin/content') }}">Contents</a></li>
              <li <?php echo activeMenu('article'); ?>><a href="{{ URL::to('admin/article') }}">Articles</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <div class="nav-collapse collapse pull-right" style="padding: 5px 0 0 0; ">
          		<span style="color: white; margin-right: 20px; position: relative; top: 5px;">Hi!, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
          		<a class="btn btn-mini btn-danger" href="{{ URL::to('admin/logout') }}"><i class="icon-off icon-red"></i> Logout</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid" id="main_container">
    	<!--<div class="row-fluid">
			<div class="span12">
				<ul class="breadcrumb">
				  <li><a href="#">Home</a> <span class="divider">/</span></li>
				  <li><a href="#">Library</a> <span class="divider">/</span></li>
				  <li class="active">Data</li>
				</ul>
			</div>
		</div>-->
		
    	@if (isset($page_title))
		<h1>{{ $page_title }}</h1>
		@endif

      	@yield('content')
    </div> <!-- /container -->
	
	{{ View::make('admin/partials/scripts') }}
	
	@if (isset($asset_js))
		{{ $asset_js }}
	@endif
  </body>
</html>