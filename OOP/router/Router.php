<?php

class Router{
    //variable to hold URI request
	private $request;

	//construct to set local request var
	public function __construct($request){
		$this->request = $request;
	}

	//function to trim / from end, set an array of arguments and require php file
	public function get($route, $file){

		$uri = trim( $this->request, "/" );

		$uri = explode("/", $uri);

		//if the input route and array index 0 (minus the /) match
		if($uri[0] == trim($route, "/")){

		    //remove index 0 and reset the array index
			array_shift($uri);
			$args = $uri;

			require $file . '.php';

		}

	}

}