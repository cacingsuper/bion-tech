<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;


class Setting extends BaseController
{
	public function __construct(){
		$this->session = session();
	}
	public function index()
	{
		return view("admin/index");
	}
	public function pages()
	{
		$data = [
			"title" => "Setting | Pages",
			"content" => (object)[
				"card_satu" => view("admin/pages/setting/pages"),
				"card_dua" => view("admin/pages/setting/pages"),
				"card_tiga" => NULL
			]
		];
		return view("admin/index", $data);
	}
}
