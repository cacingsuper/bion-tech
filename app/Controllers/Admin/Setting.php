<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Files\UploadedFile;

class Setting extends BaseController
{

	use ResponseTrait;

	public function __construct()
	{
		$this->session = session();
		$this->infoModel = new \App\Models\InfoModel();
		$this->info = $this->infoModel->find(1);
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
			"list_info" => $this->info,
			"email" 	=> explode(",",$this->info->email),
			"phone"		=> explode(",",$this->info->phone),
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
		$file = $this->request->getFile("upload_logo");
		if($file->isValid()){
			$filename = $file->getRandomName();
			$file->move(ROOTPATH . 'public/img', $filename);
			$logo = base_url("img") . "/" . $filename;
		}else{
			$logo = $this->info->logo;
		}
		$data = [
			'id'		=> 1,
			'ketua_ceo' =>  $this->request->getPost('ketua_ceo'),
			'wakil_ceo' => 	$this->request->getPost('wakil_ceo'),
			'address1' 	=>  $this->request->getPost('address1'),
			'address2' 	=> 	$this->request->getPost('address2'),
			'phone' 	=>  "{$this->request->getPost('telp1')},{$this->request->getPost('telp2')}",
			'email' 	=>  "{$this->request->getPost('email1')},{$this->request->getPost('email2')}",
			'since' 	=>  $this->request->getPost('since'),
			'employess' => 	$this->request->getPost('employees'),
			'logo'  	=> $logo
		];
		if($this->infoModel->save($data)){
			$this->session->setFlashdata('success', 'Success !!! Update Data Info ');
			return redirect()->to("admin/setting-info");
		}
		$this->session->setFlashdata('error', 'Danger!!! Update Data Gagal');
		return redirect()->to("admin/setting-info");
	}
}
