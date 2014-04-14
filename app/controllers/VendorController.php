<?php

class VendorController extends \BaseController {

	public	$common_name  = 'vendor';
	

 	function __construct() {
       $this->beforeFilter('auth');        
   	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//$vendorlist = DB::table('vendor')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('vendor_name','id');
		//return View::make(''.$this->common_name.'.create')->with('common_name',$this->common_name)->with('vendorlist',$vendorlist);
		return "hello";
	}

	public function getVendorlist(){
		$vendorlist = DB::table('vendor')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->where('vendor_name','like','%'.$_GET['term'].'%')->lists('vendor_name');
		return $vendorlist;
		//dd(DB::getQueryLog());
	}

	public function postVendorexists(){
		return DB::table('vendor')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->where('vendor_name','=',Input::get('vendor_name'))->count();
	}

	public function postCreatenewvendor(){		
		$inputData['org_id'] = Session::get('userdata')->org_id;
		$inputData['last_updated_by'] = Session::get('userdata')->id;
		$inputData['last_updated_datetime'] = date('Y-m-d H:i:s');
		$id = DB::table('vendor')->insertGetId(Input::all($inputData));
		return $id;
	}

	public function postVendorid(){
		echo json_encode(DB::table('vendor')->select('id')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->where('vendor_name','=',Input::get('vendor_name'))->first());
	}


}