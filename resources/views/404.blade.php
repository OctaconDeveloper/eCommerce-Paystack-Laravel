@extends('header')
@section('content')

<main class="inner" id="page-404">
	<div class="container">
		<div class="row">
			<div class="col-md-8 center-block">
				<div class="info-404 text-center">
					<h2 class="primary-color inner-bottom-xs">404</h2>
					<p class="lead">We are sorry, the page you've requested is not available.</p>
					<div class="text-center">
						<a class="btn-lg huge" href="{{Config::get('constant.options.sitelink')}}"><i class="fa fa-home"></i> Go to Home Page</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection
