<?php

namespace App\Controllers;

class Contact extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Contact Us",
			"page"	=> "contact"
		];
		return view('pages/contact-us', $data);
	}
}
