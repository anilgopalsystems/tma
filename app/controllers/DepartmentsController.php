<?php

class DepartmentsController extends \BaseController {

 	public	$common_name  = 'departments';

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
					->select('d.id','d.org_id','d.name','l.name AS location','d.description','d.isactive')
        			->leftJoin('locations AS l', 'd.location', '=', 'l.id')
					->get();
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
		return View::make(''.$this->common_name.'.create')->with('common_name',$this->common_name);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		DB::table($this->common_name)->insert(
			array(
				'org_id' => 1,
				'name'	=> Input::get('name'),
				'description'	=> Input::get('description'),
				)
			);
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
		$locationlist = DB::table('locations')->lists('name','id');
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
	public function destroy($id)
	{
		//
	}

}