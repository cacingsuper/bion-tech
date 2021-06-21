<?php

namespace App\Controllers;

class Contact extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Contact Us"
		];
		return view('pages/contact-us', $data);
	}
}
