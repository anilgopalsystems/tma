<?php

class AssetsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public  $tmparray  = array('0'=>'0');

	function __construct() {
       $this->beforeFilter('auth');
    }

    public function myfilter($fname){
        $mylist = DB::table('users')->select('id')->where('report_to','=',$fname)->get();
            foreach ($mylist as $key => $value) {
                $this->tmparray[] = $value->id; 
                $this->myfilter($value->id);                    
            }
    }

	public function index()
	{
        $this->myfilter(Session::get('userdata')->id);
        //var_dump($this->tmparray);
        $this->tmparray[] = Session::get('userdata')->id;
		$assetsdata = DB::table('assets')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->where('parent_asset','=','0')->whereIn('assign_to', $this->tmparray)->get();
		return View::make('assets.list')->with('assetsdata',$assetsdata);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $assetgrouplist = DB::table('assetgroups')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
        $userslist = DB::table('users')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('firstname','id');
        $locationlist = DB::table('locations')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
        $storelist = DB::table('stores')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
        $asset_key = $this->generateRandomString();
		return View::make('assets.create')->with('assetgrouplist',$assetgrouplist)->with('userslist',$userslist)->with('locationlist',$locationlist)->with('storelist',$storelist)->with('asset_key',$asset_key);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$purchased_on = DateTime::createFromFormat('d-m-Y', Input::get('purchased_on'))->format('Y-m-d');
				
		$id = DB::table('assets')
            ->insertGetId(array(
            	'asset_name' => Input::get('asset_name'),
                'asset_key' => Input::get('asset_key'),
            	'category' => Input::get('category'),
            	'purchased_on' => $purchased_on,
            	'assign_to' => Input::get('assign_to'),
            	'description' => Input::get('description'),
            	'quantity' => Input::get('quantity'),
            	'location' => Input::get('location'),
            	'store_id' => Input::get('store_id'),
            	'manufacturer' => Input::get('manufacturer'),
            	'asset_value' => Input::get('asset_value'),
            	'modelnumber' => Input::get('modelnumber'),
            	'asset_serial' => Input::get('asset_serial'),
                'parent_asset' => 0,
            	'iswarranty' => Input::get('iswarranty'),
            	'isinsurance' => Input::get('isinsurance'),
            	'issla' => Input::get('issla'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')
                )
            	);


        if(Input::get('udfvalue')){
			$count = 1;
			foreach (Input::get('udfvalue') as $key => $value) {
				$feilddata['udf'.$count] = $value;
				$count++;
			}            
            	$feilddata['org_id'] = 1;
            	$feilddata['asset_group_id'] = Input::get('category');
            	$feilddata['asset_id'] = $id;
            	$updatestatus = DB::table('assetgroupfeildvalues')->insert($feilddata);
            
        }

        for ($i=0; $i < count(Input::get('sub_asset_name')) ; $i++) {
                $sub_asset_id = Input::get('sub_asset_id');
                $sub_asset_name = Input::get('sub_asset_name');
                $sub_description = Input::get('sub_description');
                $sub_quantity = Input::get('sub_quantity');
                $sub_manufacturer = Input::get('sub_manufacturer');
                $sub_asset_serial = Input::get('sub_asset_serial');
                $sub_asset_key = Input::get('sub_asset_key');

        		DB::table('assets')
            	->where('id', $sub_asset_id[$i])
            	->where('parent_asset', $id)
            	->update(array(
            	'asset_name' => $sub_asset_name[$i],
            	'category' => Input::get('category'),
            	'purchased_on' => $purchased_on,
            	'assign_to' => Input::get('assign_to'),
            	'description' => $sub_description[$i],
            	'quantity' => $sub_quantity[$i],
            	'location' => Input::get('location'),
            	'store_id' => Input::get('store_id'),
            	'manufacturer' => $sub_manufacturer[$i],
            	'asset_value' => Input::get('asset_value'),
            	'modelnumber' => Input::get('modelnumber'),
            	'asset_serial' => $sub_asset_serial[$i],
            	'asset_key' => $sub_asset_key[$i],
            	'parent_asset' => $id,
            	'iswarranty' => Input::get('iswarranty'),
            	'isinsurance' => Input::get('isinsurance'),
            	'issla' => Input::get('issla'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')));
        }
            	//echo $updatestatus;
        for ($i=0; $i < count(Input::get('new_sub_asset_name')) ; $i++) {
                $new_sub_asset_id = Input::get('new_sub_asset_id');
                $new_sub_asset_name = Input::get('new_sub_asset_name');
                $new_sub_description = Input::get('new_sub_description');
                $new_sub_quantity = Input::get('new_sub_quantity');
                $new_sub_manufacturer = Input::get('new_sub_manufacturer');
                $new_sub_asset_serial = Input::get('new_sub_asset_serial');
                $new_sub_asset_key = Input::get('new_sub_asset_key');

            	DB::table('assets')
            	->insert(array(
            	'asset_name' => $new_sub_asset_name[$i],
            	'category' => Input::get('category'),
            	'purchased_on' => $purchased_on,
            	'assign_to' => Input::get('assign_to'),
            	'description' => $new_sub_description[$i],
            	'quantity' => $new_sub_quantity[$i],
            	'location' => Input::get('location'),
            	'store_id' => Input::get('store_id'),
            	'manufacturer' => $new_sub_manufacturer[$i],
            	'asset_value' => Input::get('asset_value'),
            	'modelnumber' => Input::get('modelnumber'),
            	'asset_serial' => $new_sub_asset_serial[$i],
            	'asset_key' => $new_sub_asset_key[$i],
            	'parent_asset' => $id,
            	'iswarranty' => Input::get('iswarranty'),
            	'isinsurance' => Input::get('isinsurance'),
            	'issla' => Input::get('issla'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')));
            }

        if(Input::get('iswarranty')){

            $warranty_start_date = DateTime::createFromFormat('d-m-Y', Input::get('warranty_start_date'))->format('Y-m-d');
            $warranty_end_date = DateTime::createFromFormat('d-m-Y', Input::get('warranty_end_date'))->format('Y-m-d');

            DB::table('assetwarranty')
            ->insert(array(
                'warranty_service_provider' => Input::get('warranty_service_provider'),
                'warranty_description' => Input::get('warranty_description'),
                'warranty_start_date' => $warranty_start_date,
                'warranty_end_date'   => $warranty_end_date,
                'org_id'   => Session::get('userdata')->org_id,
                'asset_id'   => $id
                ));
        }

        if(Input::get('isinsurance')){

            $insurance_start_date = DateTime::createFromFormat('d-m-Y', Input::get('insurance_start_date'))->format('Y-m-d');
            $insurance_end_date = DateTime::createFromFormat('d-m-Y', Input::get('insurance_end_date'))->format('Y-m-d');

            DB::table('assetinsurance')
            ->insert(array(
                'insurance_service_provider' => Input::get('insurance_service_provider'),
                'insurance_description' => Input::get('insurance_description'),
                'insurance_start_date' => $insurance_start_date,
                'insurance_end_date'      => $insurance_end_date,
                'org_id'   => Session::get('userdata')->org_id,
                'asset_id'   => $id
                ));
        }

        if(Input::get('issla')){

            $sla_start_date = DateTime::createFromFormat('d-m-Y', Input::get('sla_start_date'))->format('Y-m-d');
            $sla_end_date = DateTime::createFromFormat('d-m-Y', Input::get('sla_end_date'))->format('Y-m-d');

            DB::table('assetsla')
            ->insert(array(
                'sla_service_provider' => Input::get('sla_service_provider'),
                'sla_description' => Input::get('sla_description'),
                'sla_start_date' => $sla_start_date,
                'sla_end_date'    => $sla_end_date,
                'org_id'   => Session::get('userdata')->org_id,
                'asset_id'   => $id
                ));
        }

        return Redirect::to('myassets');
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
		/*$assetdata = DB::table('assets AS a')
					->select('a.id','a.org_id','a.asset_key','a.asset_name','ag.name AS category','a.purchased_on','u.firstname AS assign_to','a.doa','a.dor','a.description','a.quantity','l.name AS location','d.name AS store_id','a.manufacturer','a.asset_value','a.modelnumber','a.asset_serial','a.parent_asset','a.isactive')
        			->leftJoin('assetgroups AS ag', 'a.category', '=', 'ag.id')
        			->leftJoin('users AS u', 'a.assign_to', '=', 'u.id')
        			->leftJoin('locations AS l', 'a.location', '=', 'l.id')
        			->leftJoin('store_ids AS d', 'a.store_id', '=', 'd.id')
        			->where('a.id',$id)
        			->get();*/                
        $assetdata = DB::table('assets')->where('id', $id)->first();
        $subassetdata = DB::table('assets')->where('parent_asset','=',$id)->get();
        $warrantydata = DB::table('assetwarranty')->where('asset_id', $id)->first();
        $insurancedata = DB::table('assetinsurance')->where('asset_id', $id)->first();
        $sladata = DB::table('assetsla')->where('asset_id', $id)->first();
        $assetgrouplist = DB::table('assetgroups')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
        $userslist = DB::table('users')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('firstname','id');
        $locationlist = DB::table('locations')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
        $storelist = DB::table('stores')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('name','id');
	 	return View::make('assets.edit')->with('assetdata',$assetdata)->with('assetgrouplist',$assetgrouplist)->with('userslist',$userslist)->with('locationlist',$locationlist)->with('warrantydata',$warrantydata)->with('insurancedata',$insurancedata)->with('sladata',$sladata)->with('subassetdata',$subassetdata)->with('storelist',$storelist);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$purchased_on = DateTime::createFromFormat('d-m-Y', Input::get('purchased_on'))->format('Y-m-d');
				
		DB::table('assets')
            ->where('id', $id)
            ->update(array(
            	'asset_name' => Input::get('asset_name'),
            	'category' => Input::get('category'),
            	'purchased_on' => $purchased_on,
            	'assign_to' => Input::get('assign_to'),
            	'description' => Input::get('description'),
            	'quantity' => Input::get('quantity'),
            	'location' => Input::get('location'),
            	'store_id' => Input::get('store_id'),
            	'manufacturer' => Input::get('manufacturer'),
            	'asset_value' => Input::get('asset_value'),
            	'modelnumber' => Input::get('modelnumber'),
            	'asset_serial' => Input::get('asset_serial'),
            	'iswarranty' => Input::get('iswarranty'),
            	'isinsurance' => Input::get('isinsurance'),
            	'issla' => Input::get('issla'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s'))
            	);


        if(Input::get('udfvalue')){
			$count = 1;
			foreach (Input::get('udfvalue') as $key => $value) {
				$feilddata['udf'.$count] = $value;
				$count++;
			}
        	$updatestatus = DB::table('assetgroupfeildvalues')
            	->where('asset_id', $id)
            	->where('asset_group_id', Input::get('category'))
            	->update($feilddata);
            if(!$updatestatus){
            	$feilddata['org_id'] = 1;
            	$feilddata['asset_group_id'] = Input::get('category');
            	$feilddata['asset_id'] = $id;
            	$updatestatus = DB::table('assetgroupfeildvalues')->insert($feilddata);
            }
        }

        for ($i=0; $i < count(Input::get('sub_asset_name')) ; $i++) {
                $sub_asset_id = Input::get('sub_asset_id');
                $sub_asset_name = Input::get('sub_asset_name');
                $sub_description = Input::get('sub_description');
                $sub_quantity = Input::get('sub_quantity');
                $sub_manufacturer = Input::get('sub_manufacturer');
                $sub_asset_serial = Input::get('sub_asset_serial');
                $sub_asset_key = Input::get('sub_asset_key');

        		DB::table('assets')
            	->where('id', $sub_asset_id[$i])
            	->where('parent_asset', $id)
            	->update(array(
            	'asset_name' => $sub_asset_name[$i],
            	'category' => Input::get('category'),
            	'purchased_on' => $purchased_on,
            	'assign_to' => Input::get('assign_to'),
            	'description' => $sub_description[$i],
            	'quantity' => $sub_quantity[$i],
            	'location' => Input::get('location'),
            	'store_id' => Input::get('store_id'),
            	'manufacturer' => $sub_manufacturer[$i],
            	'asset_value' => Input::get('asset_value'),
            	'modelnumber' => Input::get('modelnumber'),
            	'asset_serial' => $sub_asset_serial[$i],
            	'asset_key' => $sub_asset_key[$i],
            	'parent_asset' => $id,
            	'iswarranty' => Input::get('iswarranty'),
            	'isinsurance' => Input::get('isinsurance'),
            	'issla' => Input::get('issla'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')));
        }
            	//echo $updatestatus;
        for ($i=0; $i < count(Input::get('new_sub_asset_name')) ; $i++) {
                $new_sub_asset_id = Input::get('new_sub_asset_id');
                $new_sub_asset_name = Input::get('new_sub_asset_name');
                $new_sub_description = Input::get('new_sub_description');
                $new_sub_quantity = Input::get('new_sub_quantity');
                $new_sub_manufacturer = Input::get('new_sub_manufacturer');
                $new_sub_asset_serial = Input::get('new_sub_asset_serial');
                $new_sub_asset_key = Input::get('new_sub_asset_key');

            	DB::table('assets')
            	->insert(array(
            	'asset_name' => $new_sub_asset_name[$i],
            	'category' => Input::get('category'),
            	'purchased_on' => $purchased_on,
            	'assign_to' => Input::get('assign_to'),
            	'description' => $new_sub_description[$i],
            	'quantity' => $new_sub_quantity[$i],
            	'location' => Input::get('location'),
            	'store_id' => Input::get('store_id'),
            	'manufacturer' => $new_sub_manufacturer[$i],
            	'asset_value' => Input::get('asset_value'),
            	'modelnumber' => Input::get('modelnumber'),
            	'asset_serial' => $new_sub_asset_serial[$i],
            	'asset_key' => $new_sub_asset_key[$i],
            	'parent_asset' => $id,
            	'iswarranty' => Input::get('iswarranty'),
            	'isinsurance' => Input::get('isinsurance'),
            	'issla' => Input::get('issla'),
                'org_id' => Session::get('userdata')->org_id,
                'last_updated_by' => Session::get('userdata')->id,
                'last_updated_datetime' => date('Y-m-d H:i:s')));
            }


        if(Input::get('iswarranty')){

            $warranty_start_date = DateTime::createFromFormat('d-m-Y', Input::get('warranty_start_date'))->format('Y-m-d');
            $warranty_end_date = DateTime::createFromFormat('d-m-Y', Input::get('warranty_end_date'))->format('Y-m-d');

            $warrantystatus = DB::table('assetwarranty')
            ->where('asset_id', $id)
            ->update(array(
                'warranty_service_provider' => Input::get('warranty_service_provider'),
                'warranty_description' => Input::get('warranty_description'),
                'warranty_start_date' => $warranty_start_date,
                'warranty_end_date'   => $warranty_end_date
                ));

            $war = DB::table('assetwarranty')->select('id')->where('asset_id','=',$id)->first();
            if(!isset($war->id)){
                DB::table('assetwarranty')
                ->insert(array(
                'warranty_service_provider' => Input::get('warranty_service_provider'),
                'warranty_description' => Input::get('warranty_description'),
                'warranty_start_date' => $warranty_start_date,
                'warranty_end_date'   => $warranty_end_date,
                'org_id'   => Session::get('userdata')->org_id,
                'asset_id'   => $id
                ));
            }

        }

        if(Input::get('isinsurance')){

            $insurance_start_date = DateTime::createFromFormat('d-m-Y', Input::get('insurance_start_date'))->format('Y-m-d');
            $insurance_end_date = DateTime::createFromFormat('d-m-Y', Input::get('insurance_end_date'))->format('Y-m-d');

            $insstatus = DB::table('assetinsurance')
            ->where('asset_id', $id)
            ->update(array(
                'insurance_service_provider' => Input::get('insurance_service_provider'),
                'insurance_description' => Input::get('insurance_description'),
                'insurance_start_date' => $insurance_start_date,
                'insurance_end_date'      => $insurance_end_date
                ));

            $war = DB::table('assetinsurance')->select('id')->where('asset_id','=',$id)->first();
            if(!isset($war->id)){
                DB::table('assetinsurance')
                ->insert(array(
                'insurance_service_provider' => Input::get('insurance_service_provider'),
                'insurance_description' => Input::get('insurance_description'),
                'insurance_start_date' => $insurance_start_date,
                'insurance_end_date'      => $insurance_end_date,
                'org_id'   => Session::get('userdata')->org_id,
                'asset_id'   => $id
                ));
            }
        }

        if(Input::get('issla')){

            $sla_start_date = DateTime::createFromFormat('d-m-Y', Input::get('sla_start_date'))->format('Y-m-d');
            $sla_end_date = DateTime::createFromFormat('d-m-Y', Input::get('sla_end_date'))->format('Y-m-d');

            $slastatus = DB::table('assetsla')
            ->where('asset_id', $id)
            ->update(array(
                'sla_service_provider' => Input::get('sla_service_provider'),
                'sla_description' => Input::get('sla_description'),
                'sla_start_date' => $sla_start_date,
                'sla_end_date'    => $sla_end_date
                ));

            $war = DB::table('assetsla')->select('id')->where('asset_id','=',$id)->first();
            if(!isset($war->id)){
                DB::table('assetsla')
                ->insert(array(
                'sla_service_provider' => Input::get('sla_service_provider'),
                'sla_description' => Input::get('sla_description'),
                'sla_start_date' => $sla_start_date,
                'sla_end_date'    => $sla_end_date,
                'org_id'   => Session::get('userdata')->org_id,
                'asset_id'   => $id
                ));
            }
        }


        return Redirect::to('myassets');
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

        DB::table('assets')
            ->where('id', $id)
            ->update($inputData);
        return Redirect::to('myassets');
    }

	public function udf(){
        $assetgroupfeilds = DB::table('assetgroups')->select('udf1', 'udf2', 'udf3', 'udf3', 'udf4', 'udf5', 'udf6', 'udf7', 'udf8', 'udf9', 'udf10', 'udf11', 'udf12', 'udf13', 'udf14', 'udf15', 'udf16', 'udf17', 'udf18', 'udf19', 'udf20')->where('id','=',Input::get('assetgroupid'))->first();
		echo json_encode($assetgroupfeilds);
	}

	public function udfvalues(){
		$assetgroupfeildvalues = DB::table('assetgroupfeildvalues')->select('udf1', 'udf2', 'udf3', 'udf3', 'udf4', 'udf5', 'udf6', 'udf7', 'udf8', 'udf9', 'udf10', 'udf11', 'udf12', 'udf13', 'udf14', 'udf15', 'udf16', 'udf17', 'udf18', 'udf19', 'udf20')->where('asset_id','=',Input::get('assetid'))->where('asset_group_id','=',Input::get('assetgroupid'))->first();
		echo json_encode($assetgroupfeildvalues);
	}

	public function generateRandomString($length = 10) {
    	$characters = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    	$randomString = '';
    		for ($i = 0; $i < $length; $i++) {
    		    $randomString .= $characters[rand(0, strlen($characters) - 1)];
    		}
    		$randomstatus = DB::table('assets')->where('org_id','=',Session::get('userdata')->org_id)->where('asset_key', $randomString)->pluck('asset_key');
            if($randomstatus == null){
            	return $randomString;
            }else{
            	$this->generateRandomString();
            }
   	}

    public function getstorelist(){
        $storelistdata = DB::table('stores')->select('id','name')->where('location_id','=',Input::get('location_id'))->get();
        return json_encode($storelistdata);
    }

    public function getassetkey(){
        return $this->generateRandomString();
    }

    public function getassetkeys($assetquantity = 1){
        for ($i=1; $i <= $assetquantity; $i++) { 
            $assetkeys[$i] = $this->generateRandomString();
        }
        return json_encode($assetkeys);
    }
	/*public function testing($id){
		$mydata =DB::table('assets AS a')
					->select('ag.name AS category')
        			->leftJoin('assetgroups AS ag', 'a.category', '=', 'ag.id')
        			->where('a.id',$id)
        			->get();
		return View::make('assets.test')->with('some',$mydata);
		//var_dump($asset = Assets::find($id));
		//var_dump(DB::select('select * from assets where id = '.$id));
	}*/

}