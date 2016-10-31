<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use App\Url;

class UrlController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$urls = Url::orderBy('created_at', 'desc')->get();

		return view( 'welcome', compact( 'urls' ) );
	}

	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$input = $request->except( '_token' );

		$url = Url::create( $input );

		$url->creation_ip = $_SERVER['REMOTE_ADDR'];

		$url->code = $this->getCode();

		$url->save();

		$response = [ 'success' => true, 'url' => $url->url, 'generated_url' => $url->generated_url, 'date' => $url->created_at->format( 'M d, Y' ) ];

		return $response;
	}	

	public function redirect( $code )
	{
		$url = Url::where( 'code', $code )->first();
		// var_dump( $url );
		if( $url )
		{
			$url->views()->create( [ 'ip' => $_SERVER['REMOTE_ADDR'] ]);

			return Redirect::to( $url->url );
			exit;
		}
		abort( 404 );
	}

	private function getCode()
	{
		do
		{
			$code = $this->random();

			$url = Url::where( 'code', $code )->get();
		}
		while( !$url->isEmpty() );

		return $code;
	}

	private function random( $length = 6 )
	{
		return substr( str_shuffle( str_repeat( $x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil( $length / strlen( $x ) ) ) ), 1, $length );
	}

	public function info( $code )
	{
		$url = Url::where( 'code', $code )->first();

		if( $url )
		{
			$data_chart = $this->getDataChart( $url );

			return view( 'info', compact( 'url', 'data_chart' ) );
			exit;
		}
		abort( 404 );		
	}

	private function getDataChart( $url )
	{
		$data = [];

		for ( $i=0; $i <= date( 'H' ); $i++ ) { 
			$data[ "$i:00" ] = [ $url->views()->where('created_at', '>=', date('Y-m-d')." $i:00:00" )->where('created_at', '<=', date('Y-m-d')." $i:59:59" )->count() ];
		}

		return $data;
	}
}
