<?php

namespace App\Controllers;

class Home extends BaseController
{
	
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$users = $userModel->findAll();

		echo json_encode($users);die();
		return view('pages/home');
	}
}
