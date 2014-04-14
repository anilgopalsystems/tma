<?php

class LoginController extends BaseController {

	//protected $layout = "layouts.main";

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('except'=>array('getIndex','postSignin')));
	}

/*	public function getRegister() {
		$this->layout->content = View::make('users.register');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			return Redirect::to('users/login')->with('message', 'Thanks for registering!');
		} else {
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}*/

	public function getIndex() {
		return View::make('common.login');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			$userdata =  DB::table('users')->select('id','firstname','lastname','org_id','type','email')->where('email', Input::get('email'))->first();
			$usergroupdata =  DB::table('usersgroup')->where('id', $userdata->type)->first();
			Session::put('userdata', $userdata);
			Session::put('usergroupdata', $usergroupdata);
			Session::put('prourl', '/public/');
			return Redirect::to('dashboard')->with('loginstatus', 'You are now logged in!');
		} else {
			return Redirect::to('login')
				->with('loginstatus', 'Your username/password was incorrect')
				->withInput();
				//return "false";
		}
		//return "something";
	}

	public function getDashboard() {
		return View::make('common.dashboard');
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('login')->with('message', 'Your are now logged out!');
	}
}