<?php

namespace App\Controllers;

class Home extends BaseController
{
	
	public function index()
	{
		$userModel = new \App\Models\UserModel();
		$users = $userModel->findAll();

		return view('pages/home');
	}
}
