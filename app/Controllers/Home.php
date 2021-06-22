<?php

namespace App\Controllers;

class Home extends BaseController
{
	
	public function index()
	{
		// $userModel = new \App\Models\UserModel();
		// $users = $userModel->findAll();
		$data = [
			"title" => "BIONSCE",
			"page"  => "HOME"
		];
		return view('pages/home', $data);
	}
}
