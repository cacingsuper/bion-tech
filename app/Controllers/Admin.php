<?php

namespace App\Controllers;
use App\Controllers\BaseController;


class Admin extends BaseController
{
	public function __construct(){
		$this->session = session();
	}
	public function index()
	{
        echo "Welcome back, ".$this->session->get('username');
	}
}
