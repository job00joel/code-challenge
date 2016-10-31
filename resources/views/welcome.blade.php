@extends('layouts/app')

@section('content')

	<div class="row">
		<div class="col-md-6 center">
			<div class="form">
				{!! Form::open( [ 'url' => '/', 'method' => 'post', 'id' => 'url-save', 'class' => 'form-inline' ] ) !!}

				
				{!! Form::text( 'url', null, [ 'id' => 'url', 'placeholder' => 'Your original URL here', 'class' => 'form-control' ] ) !!}

				{!! Form::submit( 'SHORTEN URL', [ 'class' => 'btn btn-default' ] ) !!}

				{!! Form::close() !!}
			</div>

			<br><br>

			@if( $urls )
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<td>Original URL</td>
								<td>Created</td>
								<td>Short URL</td>
								<td>All clicks</td>
							</tr>
						</thead>
						<tbody>
							@foreach( $urls as $url )
								<tr>
									<td><a href="{{ $url->url }}">{{ $url->url }}</a></td>
									<td>{{ $url->created_at->format( 'M d, Y' ) }}</td>
									<td><a href="{{ $url->generated_url }}">{{ $url->generated_url }}</a></td>
									<td>{{ $url->views()->count() }}</td>
									<td><a href="{{ $url->info_url }}"><i class="fa fa-bar-chart" aria-hidden="true"></i></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>
	</div>
	

@stop