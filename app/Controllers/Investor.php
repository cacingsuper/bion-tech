<?php

namespace App\Controllers;

class Investor extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Investor Relations",
			"page"  => "investor"
		];

		return view('pages/investor-relations', $data);
	}
}