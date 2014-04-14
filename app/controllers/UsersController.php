<?php

class UsersController extends BaseController {

	public	$common_name  = 'users';
	public	$tmparray  = array('0'=>'0');
	public	$tmpusergrouplist  = array('0'=>'0');

 	function __construct() {
       $this->beforeFilter('auth'); 
   	}

	public function myfilter($fname){
		$mylist = DB::table($this->common_name)->select('id')->where('report_to','=',$fname)->get();
			foreach ($mylist as $key => $value) {
                $this->tmparray[] = $value->id; 
                $this->myfilter($value->id);                	
            }
	}


	public function usersgroupfilter($fname){
		$mylist = DB::table('usersgroup')->select('id')->where('parent_id','=',$fname)->get();
			foreach ($mylist as $key => $value) {
                $this->tmpusergrouplist[] = $value->id; 
                $this->usersgroupfilter($value->id);                	
            }
	}

	public function index()
	{
		$this->myfilter(Session::get('userdata')->id);
		$data = DB::table($this->common_name)->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->whereIn('id', $this->tmparray)->get();
		return View::make(''.$this->common_name.'.list')->with('common_name',$this->common_name)->with('data',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//echo '<div class="menuvalue" style="display:none">'.$this->common_name.'</div>';
		$userslist = DB::table('users')->select('lastname','firstname','id')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->get();
		$this->usersgroupfilter(Session::get('usergroupdata')->id);
		$usergrouplist = DB::table('usersgroup')->select('id','name')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->whereIn('id', $this->tmpusergrouplist)->get();
		//var_dump($usergrouplist);
		return View::make(''.$this->common_name.'.create')->with('common_name',$this->common_name)->with('userslist',$userslist)->with('usergrouplist',$usergrouplist);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$dob = DateTime::createFromFormat('d-m-Y', Input::get('dob'))->format('Y-m-d');
		$hiredate = DateTime::createFromFormat('d-m-Y', Input::get('hiredate'))->format('Y-m-d');
		$password = Hash::make(Input::get('password'));
		DB::table($this->common_name)->insert(
			array(
				'firstname'	=> Input::get('firstname'),
				'lastname'	=> Input::get('lastname'),
				'gender'	=> Input::get('gender'),
				'dob'	=> $dob,
				'email'	=> Input::get('email'),
				'mobile'	=> Input::get('mobile'),
				'address1'	=> Input::get('address1'),
				'address2'	=> Input::get('address2'),
				'city'	=> Input::get('city'),
				'pincode'	=> Input::get('pincode'),
				'state'	=> Input::get('state'),
				'pan'	=> Input::get('pan'),
				'fathersname'	=> Input::get('fathersname'),
				'aadhaar'	=> Input::get('aadhaar'),
				'hiredate'	=> $hiredate,
				'position'	=> Input::get('position'),
				'report_to'	=> Input::get('report_to'),
				'type'	=> Input::get('type'),
				'password'	=> $password,
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')
				)
			);
		return Redirect::to($this->common_name);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{              
        $usersdata = DB::table('users')->where('id', $id)->first();
        
        $userslist = DB::table('users')->select('lastname','firstname','id')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->get();
		$this->usersgroupfilter(Session::get('usergroupdata')->id);
		$usergrouplist = DB::table('usersgroup')->select('id','name')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->whereIn('id', $this->tmpusergrouplist)->get();
	 	return View::make(''.$this->common_name.'.edit')->with('common_name',$this->common_name)->with('usersdata',$usersdata)->with('userslist',$userslist)->with('usergrouplist',$usergrouplist);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$dob = DateTime::createFromFormat('d-m-Y', Input::get('dob'))->format('Y-m-d');
		$hiredate = DateTime::createFromFormat('d-m-Y', Input::get('hiredate'))->format('Y-m-d');

		DB::table('users')
            ->where('id', $id)
            ->update(array(
				'firstname'	=> Input::get('firstname'),
				'lastname'	=> Input::get('lastname'),
				'gender'	=> Input::get('gender'),
				'dob'	=> $dob,
				'email'	=> Input::get('email'),
				'mobile'	=> Input::get('mobile'),
				'address1'	=> Input::get('address1'),
				'address2'	=> Input::get('address2'),
				'city'	=> Input::get('city'),
				'pincode'	=> Input::get('pincode'),
				'state'	=> Input::get('state'),
				'pan'	=> Input::get('pan'),
				'fathersname'	=> Input::get('fathersname'),
				'aadhaar'	=> Input::get('aadhaar'),
				'hiredate'	=> $hiredate,
				'position'	=> Input::get('position'),
				'report_to'	=> Input::get('report_to'),
				'type'	=> Input::get('type'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')
				)
			);
		return Redirect::to($this->common_name);		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$inputData = array_except(Input::all(),array('_method','_token'));
		$inputData['status'] = 0;
		$inputData['last_updated_datetime'] = date('Y-m-d H:i:s');
		$inputData['last_updated_by'] = Session::get('userdata')->id;

		DB::table($this->common_name)
            ->where('id', $id)
            ->update($inputData);
        return Redirect::to($this->common_name);
	}



}