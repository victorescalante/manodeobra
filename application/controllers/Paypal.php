<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller
{
	 function  __construct(){
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model('product');
	 }

	 function success(){
	    //get the transaction data
		$paypalInfo = $this->input->post();

		$data['item_number'] = $paypalInfo['item_number'];
		$data['txn_id'] = $paypalInfo["txn_id"];
		$data['payment_amt'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['status'] = $paypalInfo["payer_status"];

		$this->ipn($paypalInfo);

		//pass the transaction data to view

        $this->bladeView('paypal.success',['data' => $data]);
	 }

	 function cancel(){
        $this->bladeView('paypal.cancel');
	 }

	 function ipn($paypalInfo){
			//paypal return transaction details array
			//var_dump($paypalInfo);
			$data['user_id'] = 1;
			$data['product_id']	= $paypalInfo["item_number"];
			$data['product_name']	= $paypalInfo["item_name"];
			$data['txn_id']	= $paypalInfo["txn_id"];
			$data['payment_gross'] = $paypalInfo["payment_gross"];
			$data['currency_code'] = $paypalInfo["mc_currency"];
			$data['payer_email'] = $paypalInfo["payer_email"];
			$data['payment_status']	= $paypalInfo["payment_status"];

			$paypalURL = $this->paypal_lib->paypal_url;
			$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);

			//check whether the payment is verified
			if(preg_match("/VERIFIED/i",$result)){
			    //insert the transaction data into the database
				$this->product->insertTransaction($data);
			}
    }
}
