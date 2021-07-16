<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Page extends BaseController
{
	public function __construct(){
		$this->session = session();
	}
	public function index()
	{
		$data = [
			"title" => "Pages",
			"breadcrumb"  => ["Pages", "Main"],
			"content" => (object)[
				"card_satu" 	=> NULL,
				"card_dua" 		=> NULL,
				"card_tiga"		=> NULL 
			]
		];
		return view("admin/index", $data);
	}
    public function content(){
        $data = [
			"title" => "Pages",
			"breadcrumb"  => ["Pages", "Main"],
			"content" => (object)[
				"card_satu" 	=> NULL,
				"card_dua" 		=> NULL,
				"card_tiga"		=> NULL 
			]
		];
        return view("admin/index", $data);
    }
}
