	@include('includes.tophead')

		@yield('pagestylesheets')

	@include('includes.bottomhead')

	@include('includes.header')

	@include('includes.sidebar')

		@yield('content')

	@include('includes.footer')

	@include('includes.foot')

		@yield('pageplugins')

</body>
<!-- END BODY -->


</html>

