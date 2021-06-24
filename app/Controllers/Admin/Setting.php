<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;


class Setting extends BaseController
{

	use ResponseTrait;

	public function __construct()
	{
		$this->infoModel = new \App\Models\InfoModel();
		$this->info = $this->infoModel->findAll();
	}
	public function index()
	{
		return view("admin/index");
	}
	public function pages()
	{
		$data = [
			"title" => "Setting | Pages",
			"breadcrumb" => ["Setting", "Pages"],
			"content" => (object)[
				"card_satu" => view("admin/pages/setting/pages"),
				"card_dua" => NULL,
				"card_tiga" => NULL
			]
		];
		return view("admin/index", $data);
	}

	public function info()
	{
		$card_satu = [
			"list_info" => $this->info
		];
		$data = [
			"title" => "Setting | Info ",
			"breadcrumb" => ["Setting", "Info"],
			"content" => (object)[
				"menu"      => NULL,
				"card_satu" => view("admin/pages/setting/info", $card_satu),
				"card_dua"  => NULL
			],

		];
		return view("admin/index", $data);
	}

	public function update_info()
	{
		$this->validate([
			'title' => 'required|min_length[3]|max_length[255]',
			'body'  => 'required',
		]);
		
		$data = [
			'ketua_ceo' =>  $this->request->getPost('ketua_ceo'),
			'wakil_ceo' => 	$this->request->getPost('ketua_ceo'),

			'address1' =>  $this->request->getPost('address1'),
			'address2' => 	$this->request->getPost('address2'),

			'telp1' =>  $this->request->getPost('telp1'),
			'telp2' => 	$this->request->getPost('telp2'),

			'email' =>  [$this->request->getPost('email'), $this->request->getPost('email')],

			'since' =>  $this->request->getPost('since'),
			'employess' => 	$this->request->getPost('employees'),
		];
		$this->infoModel->save();
	}
}
