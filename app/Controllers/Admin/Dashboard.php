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
        // echo "Welcome back, ".$this->session->get('username');
		return view("admin/index");
	}
}
