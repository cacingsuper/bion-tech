<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Dashboard extends BaseController
{
	public function __construct(){
		$this->session = session();
	}
	public function index()
	{
		$data = [
			"title" => "Dashboard",
			"breadcrumb"  => ["Dashboard", "Main"],
			"content" => (object)[
				"card_satu" 	=> NULL,
				"card_dua" 		=> NULL,
				"card_tiga"		=> NULL 
			]
		];
		return view("admin/index", $data);
	}
}
