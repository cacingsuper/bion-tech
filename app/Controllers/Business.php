<?php

namespace App\Controllers;

class Business extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Our Business",
			"page"  => "business"
		];
		return view('pages/product-services', $data);
	}
}