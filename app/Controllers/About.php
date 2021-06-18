<?php

namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		return view('pages/about-us/company-overview');
	}
	public function board_directors()
	{
		return view('pages/about-us/board_directors');
	}
	public function senior_management()
	{
		return view('pages/about-us/senior_management');
	}
	
}
