@extends('layouts/app')

@section('content')

	<div class="row">
		<div class="col-md-6 center">
			
			<div class="info">
				<div class="back"><a href="{!! URL::to('/') !!}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>
				<h3>Analytics data for <a href="{{ $url->generated_url }}">{{ $url->generated_url }}</a></h3>

				<p>Created {{ $url->created_at->format( 'M d, Y' ) }}</p>
				<p>Original URL: <a href="{{ $url->url }}">{{ $url->url }}</a></p>
			</div>

			<div class="chart">
				<div class="clicks"><span>Total Clicks</span><h3>{{ $url->views()->count() }}</h3></div>
				<div class="timeframe">Timeframe: <b>Today</b></div>
			</div>
			
			<canvas id="clicks"></canvas>

			{!! app()->chartbar->render( "clicks", $data_chart ) !!}
		</div>
	</div>
	

@stop
