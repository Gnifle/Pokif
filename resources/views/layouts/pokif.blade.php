<!DOCTYPE html>

<html lang="en">

<head>
	@include('includes.head')
</head>

<body>

<div style="height: 0; width: 0; position: absolute; visibility: hidden">
	{!! include( resource_path() . '/assets/svg/svg.svg' ) !!}
</div>

<div id="page" class="container">
	
	<header>
		@include('includes.header')
	</header>
	
	<main id="main">
		
		<nav id="menu">
			@include('includes.menu')
		</nav>
		
		<div id="content">
			@yield('content')
		</div>
	</main>
	
	<footer>
		@include('includes.footer')
	</footer>

</div>

@stack('lazy_scripts')

<script type="text/javascript" src="https://rawgit.com/FremyCompany/css-grid-polyfill/1.1.0/bin/css-polyfills.min.js"></script>

</body>

</html>