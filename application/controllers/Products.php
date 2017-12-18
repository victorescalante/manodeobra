<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends MY_Controller
{
	function  __construct() {
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model('product');
	}

	function index(){
		//get products data from database
    $data['products'] = $this->product->getRows();
		//pass the products data to view
		$this->bladeView('products.index', ['products' => $data]);
	}

	function buy($id){
		//Set variables for paypal form
		$returnURL = base_url('index.php/paypal/success'); //payment success url
		$cancelURL = base_url('index.php/paypal/cancel'); //payment cancel url
		$notifyURL = base_url('index.php/paypal/ipn'); //ipn url
		//get particular product data
		$product = $this->product->getRows($id);
		$userID = 1; //current user id
		$logo = base_url('assets/img/logo1.jpg');

		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product['name']);
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $product['id']);
		$this->paypal_lib->add_field('amount',  $product['price']);
		$this->paypal_lib->image($logo);

		$this->paypal_lib->paypal_auto_form();
	}
}
