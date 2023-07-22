<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Stocks extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->Model("Stock");
	}

	public function index_html()
  	{
		$view_data['stocks'] = $this->Stock->get_all_stocks();
		$this->load->view("partials/stocks", $view_data);
  	}

	public function filter()
	{
		$search_name = $this->input->post('search');
		$price_min = $this->input->post('price_min');
		$price_max = $this->input->post('price_max');
		$orderby = $this->input->post('orderby');
		//var_dump($search_name);

		$filters = array(
			'search_name' => $search_name,
			'price_min' => $price_min,
			'price_max' => $price_max,
			'orderby' => $orderby
		);

		$stocks = $this->Stock->filter_stocks($search_name, $price_min, $price_max, $orderby);
		$view_data['stocks'] = $stocks;
		$this->load->view("partials/stocks", $view_data);
	}

	public function index()
	{ 
		$this->load->view('stocks');
	}
}
?>