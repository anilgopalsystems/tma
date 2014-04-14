<?php

class GrnController extends \BaseController {

	public	$common_name  = 'grn';

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
		$vendorlist = DB::table('vendor')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->lists('vendor_name','id');
		return View::make(''.$this->common_name.'.create')->with('common_name',$this->common_name)->with('vendorlist',$vendorlist);
	}

	public function getAssetkey(){
		    $characters = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    		$randomString = '';
    		for ($i = 0; $i < $length; $i++) {
    		    $randomString .= $characters[rand(0, strlen($characters) - 1)];
    		}
    		$randomstatus = DB::table('assets')->where('org_id','=',Session::get('userdata')->org_id)->where('asset_key', $randomString)->pluck('asset_key');
            if($randomstatus == null){
            	return $randomString;
            }else{
            	$this->getAssetkey();
            }
	}

	public function sequence($id){
		$sequencedata = DB::table('sequence')->select('id','prefix','increment','maxvalue','current_value')->where('org_id','=',Session::get('userdata')->org_id)->where('id','=',$id)->first();
		$grn_sequence = $sequencedata->prefix.$sequencedata->current_value;

		DB::table('sequence')
            ->where('id', $sequencedata->id)
            ->update(array('current_value' => $sequencedata->current_value+1));

        return $grn_sequence;
	}

	public function postStore(){
/*		$seq_id = DB::table('sequence')->select('id')->where('org_id','=',Session::get('userdata')->org_id)->where('seq_type','=','grn')->first();
		$grn_number = $this->sequence($seq_id->id);
		
		// GRNheader data
		$invoice_date_time = DateTime::createFromFormat('d-m-Y', Input::get('invoice_date'))->format('Y-m-d');		
		$headerinputData['org_id'] = Session::get('userdata')->org_id;
		$headerinputData['last_updated_by'] = Session::get('userdata')->id;
		$headerinputData['last_updated_datetime'] = date('Y-m-d H:i:s');

		$headerinputData['grn_number'] = $grn_number;
		$headerinputData['invoice_number'] = Input::get('invoice_number');
		$headerinputData['invoice_date_time'] = $invoice_date_time;
		$headerinputData['invoice_amount'] = Input::get('invoice_amount');
		$headerinputData['grn_date_time'] = date('Y-m-d H:i:s');
		$headerinputData['vendor_id'] = Input::get('vendor_id');

		DB::table('grnheader')->insert($headerinputData);


		//GRNdetail data
		$detailinputData['org_id'] = $headerinputData['org_id'];
		$detailinputData['last_updated_by'] = $headerinputData['last_updated_by'];
		$detailinputData['last_updated_datetime'] = $headerinputData['last_updated_datetime'];

		$iteminputData['org_id'] = $headerinputData['org_id'];
		$iteminputData['last_updated_by'] = $headerinputData['last_updated_by'];
		$iteminputData['last_updated_datetime'] = $headerinputData['last_updated_datetime'];
		
		$detailinputData['grn_number'] = $grn_number;
		$seq_id = DB::table('sequence')->where('org_id','=',Session::get('userdata')->org_id)->where('seq_type','=','itemcode')->first();

		 for ($i=0; $i < count(Input::get('item_name')) ; $i++) {
		 	$item_cost = Input::get('item_cost');
		 	$quantity = Input::get('quantity');
		 	$item_name = Input::get('item_name');
		 	$item_description = Input::get('item_description'); 
		 	$mfg_code = Input::get('mfg_code');
		 	$manufacturer = Input::get('manufacturer');

			$detailinputData['grn_line_number'] = $i+1;
			$detailinputData['item_code'] = $this->sequence($seq_id->id);
			$detailinputData['item_cost'] =$item_cost[$i];
			$detailinputData['quantity'] =$quantity[$i];

			$iteminputData['item_code'] = $detailinputData['item_code'];
			$iteminputData['item_name'] = $item_name[$i];
			$iteminputData['item_description'] = $item_description[$i];
			$iteminputData['mfg_code'] = $mfg_code[$i];
			$iteminputData['manufacturer'] = $manufacturer[$i];
			$iteminputData['item_avg_cost'] = $item_cost[$i];
			$iteminputData['item_last_cost'] = $item_cost[$i];
			$iteminputData['quantity'] = $quantity[$i];

			if(json_encode(DB::table('item_master')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->where('item_name','=',$item_name[$i])->count())==0){
				
            	DB::table('item_master')->insert($iteminputData);

			}else{

				$itemdata = DB::table('item_master')->select('item_avg_cost','quantity')->where('org_id','=',Session::get('userdata')->org_id)->where('status','=','1')->where('item_name','=',$item_name[$i])->first();
				$iteminputData['item_avg_cost']	= ($item_cost[$i]+$itemdata->item_avg_cost)/($quantity[$i]+$itemdata->quantity);		
				$iteminputData['item_last_cost'] = $item_cost[$i];
				$iteminputData['quantity'] = $quantity[$i]+$itemdata->quantity;
				
				DB::table('item_master')
            	->where('item_name', $item_name[$i])
            	->update($iteminputData);
            	//var_dump($itemdata);
			}
			
			DB::table('grndetails')->insert($detailinputData);

		}*/
	
	for ($i=0; $i < count(Input::get('asset_serial')) ; $i++) {
		$temp = Input::get('asset_serial');
		echo $temp[$i];
	}
	

	}



}