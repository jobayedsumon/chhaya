<?php

namespace App\Helpers;
use DB;
use Illuminate\Database\Eloquent\Model;

class Helper
{

    public static function getThumbnailByPageId($id){
        $data = DB::table('tb_pages')->where('pageID', $id)->first();
        return $data->image;
    }
	
	
	//Return true if order is not expired
	public static function verifyOrder($orderId){
		$order = DB::table('con_orders')->where('id', $orderId)->first();
		if($order->status != 1){
			$result = false;
		}else{
			$currentDate = date('Y-m-d H:i:s');
			$activatedTime = $order->updated_at;
			$packageId = $order->package_id;
			$package = DB::table('con_package')->where('id', $packageId)->first();
			$durationMonth = '+'.$package->package_duration.' months';
			$effectiveDate = date('Y-m-d H:i:s', strtotime($durationMonth, strtotime($activatedTime)));
			
			if ($currentDate < $effectiveDate) {
				$result = true;
			}else{
				$result = false;
			}
			
		}

		return $result;

	}
		
 
	
}