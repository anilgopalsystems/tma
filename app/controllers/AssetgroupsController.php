<?php

class AssetgroupsController extends \BaseController {

 	public	$common_name  = 'assetgroups';

 	function __construct() {
       $this->beforeFilter('auth'); 
   	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = DB::table($this->common_name)->where('status','=','1')->where('org_id','=',Session::get('userdata')->org_id)->get();
		return View::make(''.$this->common_name.'.list')->with('common_name',$this->common_name)->with('data',$data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make(''.$this->common_name.'.create')->with('common_name',$this->common_name);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			$data['org_id'] = 1;
			$data['name'] = Input::get('name');
			$data['description'] = Input::get('description');
			$data['org_id'] = Session::get('userdata')->org_id;
			$data['last_updated_by'] = Session::get('userdata')->id;
			$data['last_updated_datetime'] = date('Y-m-d H:i:s');

		if(Input::get('udf')){
			$count = 1;
			foreach (Input::get('udf') as $key => $value) {
				$data['udf'.$count] = $value;
				$count++;
			}
			DB::table($this->common_name)->insert($data);
		}else{
			DB::table($this->common_name)->insert($data);
		}
		return Redirect::to($this->common_name);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = DB::table($this->common_name)->where('id', $id)->first();
		return View::make(''.$this->common_name.'.edit')->with('common_name',$this->common_name)->with('data',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$data['org_id'] = 1;
			$data['name'] = Input::get('name');
			$data['description'] = Input::get('description');
			$data['org_id'] = Session::get('userdata')->org_id;
			$data['last_updated_by'] = Session::get('userdata')->id;
			$data['last_updated_datetime'] = date('Y-m-d H:i:s');

		if(Input::get('udf')){
			$count = 1;
			foreach (Input::get('udf') as $key => $value) {
				$data['udf'.$count] = $value;
				$count++;
			}
			DB::table($this->common_name)
        	    ->where('id', $id)
        	    ->update($data);
		}else{
			DB::table($this->common_name)
        	    ->where('id', $id)
        	    ->update($data);
		}
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