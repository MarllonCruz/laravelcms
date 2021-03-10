@extends('site.layout')

@section('title', $page['title'])

@section('content')

<div class="container page">
	<div class="row">
		<div class="col-md-12">
			<div class="main_heading">
				<h1>{{ $page['title'] }}</h1>
				<div class="text-center"><span style="background-color:{{$front_config['bgcolor']}};" class="underline"></span></div>
			</div>
		</div>
	</div>

	<div class="row">
		{!! $page['body'] !!}
	</div>
</div>

@endsection