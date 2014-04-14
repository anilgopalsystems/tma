<?php

class DashboardController extends BaseController {

 	function __construct() {
       $this->beforeFilter('auth'); 
   	}

	public function getIndex(){
		return View::make('common.dashboard');
	}


}