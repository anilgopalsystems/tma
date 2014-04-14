<?php

class StoresController extends \BaseController {

 	public	$common_name  = 'stores';

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
		$data = DB::table($this->common_name.' AS d')
					->select('d.id','d.org_id','d.name','l.name AS location','d.description','d.status')
        			->leftJoin('locations AS l', 'd.location_id', '=', 'l.id')
					->where('d.org_id','=',Session::get('userdata')->org_id)->where('d.status','=','1')->get();
		return View::make(''.$this->common_name.'.list')->with('common_name',$this->common_name)->with('data',$data);
		//var_dump($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$locationlist = DB::table('locations')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
		return View::make(''.$this->common_name.'.create')->with('common_name',$this->common_name)->with('locationlist',$locationlist);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputData = array_except(Input::all(),array('_method','_token'));		
		$inputData['org_id'] = Session::get('userdata')->org_id;
		$inputData['last_updated_by'] = Session::get('userdata')->id;
		$inputData['last_updated_datetime'] = date('Y-m-d H:i:s');

		DB::table($this->common_name)->insert($inputData);
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
		$locationlist = DB::table('locations')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
		return View::make(''.$this->common_name.'.edit')->with('common_name',$this->common_name)->with('data',$data)->with('locationlist',$locationlist);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputData = array_except(Input::all(),array('_method','_token'));		
		$inputData['org_id'] = Session::get('userdata')->org_id;
		$inputData['last_updated_by'] = Session::get('userdata')->id;
		$inputData['last_updated_datetime'] = date('Y-m-d H:i:s');

		DB::table($this->common_name)
            ->where('id', $id)
            ->update($inputData);
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

	public function createstore(){
		$data['store_id'] = DB::table('stores')->insertGetId(
			array(
				'org_id' => Session::get('userdata')->org_id,
				'name'	=> Input::get('store_name'),
				'description'	=> Input::get('store_description'),
				'location_id' => Input::get('location_id'),
				'last_updated_by' => Session::get('userdata')->id,
				'last_updated_datetime' => date('Y-m-d H:i:s')
				)
			);
		return $data;
	}

}