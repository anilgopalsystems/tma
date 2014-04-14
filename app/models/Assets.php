<?php

class Assets extends Eloquent {

	public function user(){
		return $this->belongsTo('User','assign_to');
	}

	public function cat(){
		return $this->belongsTo('Assetgroups','category');
	}
}