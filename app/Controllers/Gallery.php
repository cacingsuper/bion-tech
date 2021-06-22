<?php

namespace App\Controllers;

class Gallery extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Gallery",
			"page"	=> "gallery"
		];
		return view('pages/gallery', $data);
	}
}
